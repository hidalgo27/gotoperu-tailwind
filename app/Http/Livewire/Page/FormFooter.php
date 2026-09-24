<?php
// /app/Http/Livewire/Page/FormFooter.php
namespace App\Http\Livewire\Page;

use App\Models\TCategoria;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class FormFooter extends Component
{
    public $values_categories = [], $values_number, $values_trip_length, $travel_day, $comment, $name, $email, $phone, $country, $phonecountry, $values_number_input, $success, $device, $browser;
    public $firstTouch = [];
    public $ctaSource = 'form';
    public $marketingHome = false;

    public function mount()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
            $this->device = 'Móvil';
        } elseif ($agent->isTablet()) {
            $this->device = 'Tablet';
        } else {
            $this->device = 'Desktop';
        }

        $this->browser = $agent->browser();
        $this->marketingHome = request()->routeIs('home');
        if ($this->marketingHome) {
            $this->firstTouch = array_merge([
                'first_landing_type' => 'home',
                'first_landing_path' => '/',
            ], request()->only(['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'gclid', 'fbclid']));
        }
    }

    public function updatingMarketingHome()
    {
        // The page that mounted this shared form is server-owned.
        abort(403);
    }

    protected function marketingAttribution()
    {
        if (!$this->marketingHome) {
            return [];
        }

        $firstTouch = is_array($this->firstTouch) ? $this->firstTouch : [];
        $firstPath = $firstTouch['first_landing_path'] ?? null;
        $validFirstTouch = in_array($firstTouch['first_landing_type'] ?? null, ['home', 'package', 'offer', 'other'], true)
            && is_string($firstPath) && mb_check_encoding($firstPath, 'UTF-8') && mb_strlen($firstPath) <= 1024
            && strpos($firstPath, '/') === 0 && strpos($firstPath, '//') !== 0
            && !preg_match('/[<>?#\x00-\x1F\x7F]/u', $firstPath);
        $attribution = [
            'First Landing Type' => $validFirstTouch ? $firstTouch['first_landing_type'] : 'home',
            'First Landing' => $validFirstTouch ? $firstPath : '/',
        ];
        foreach ([
            'utm_source' => 'UTM Source', 'utm_medium' => 'UTM Medium', 'utm_campaign' => 'UTM Campaign',
            'utm_content' => 'UTM Content', 'utm_term' => 'UTM Term', 'gclid' => 'GCLID', 'fbclid' => 'FBCLID',
        ] as $key => $label) {
            $value = $firstTouch[$key] ?? null;
            if (!is_string($value) || !mb_check_encoding($value, 'UTF-8')) {
                continue;
            }
            if (in_array($key, ['gclid', 'fbclid'], true)) {
                if ($value === '' || mb_strlen($value) > 512 || preg_match('/[<>\x00-\x20\x7F]/u', $value)) {
                    continue;
                }
            } else {
                $value = mb_substr(trim(preg_replace('/[\x00-\x1F\x7F]+/u', ' ', strip_tags($value)) ?? ''), 0, 255);
            }
            if ($value !== '') {
                $attribution[$label] = $value;
            }
        }
        $attribution['Conversion Page Type'] = 'home';
        $attribution['Conversion Page'] = '/';
        $attribution['CTA Source'] = in_array($this->ctaSource, ['hero', 'rail', 'final', 'form'], true) ? $this->ctaSource : 'form';
        return $attribution;
    }

    public function render()
    {
        $categories = TCategoria::all();

        $number = ['1','2','3','4','5'];
        $trip_lengths = ['3-5','6-8','9-11','12-16','16+'];
        $hotels = [
            [
                'star'=>'5',
                'category'=>__('message.form_footer_par15')
            ],
            [
                'star'=>'4',
                'category'=>__('message.form_footer_par16')
            ],
            [
                'star'=>'3',
                'category'=>__('message.form_footer_par17')
            ]
        ];


        return view('livewire.page.form-footer', compact('categories', 'number','trip_lengths','hotels'));
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $attribution = $this->marketingAttribution();
        $g1Comment = $this->comment;
        if ($attribution) {
            $lines = [];
            foreach ($attribution as $label => $value) {
                $lines[] = $label . ': ' . $value;
            }
            $block = "[Marketing Attribution]\n" . implode("\n", $lines) . "\n[/Marketing Attribution]";
            $g1Comment = (string) $this->comment . (trim((string) $this->comment) !== '' ? "\n\n" : '') . $block;
        }

        $from = 'info@gotoperu.com';

        if ($this->values_number == '6'){
            $travellers = $this->values_number_input;
        }else{
            $travellers = $this->values_number;
        }

        $hotels_s = '';
        foreach ($this->values_categories as $item) {
            $hotels_s.=$item;
        }

        // Parsear la fecha recibida de Livewire, que probablemente esté en un formato legible como "9 Oct 2024"
        $travelDay = Carbon::parse($this->travel_day);

        // Formatear la fecha a ISO 8601 ("Y-m-d\TH:i:s.v\Z"), que es el formato deseado
//        $formattedDate = $travelDay->format('Y-m-d\TH:i:s.v\Z');
        $formattedDate = $travelDay->format('Y-m-d');



//        $trip_length = '';
//        foreach ($this->values_trip_length as $item) {
//            $trip_length.=$item;
//        }

//        $formattedDate = Carbon::parse($this->travel_date)->format('Y-m-d H:i:s');

        $inquireDate = Carbon::now('America/Lima')->format('Y-m-d H:i:s');

        // Preparar los datos que se enviarán al servicio
        $data = [
            "category_d" => array_filter($this->values_categories),
            "destino_d" => [], // Aquí puedes agregar los destinos si los tienes
            "pasajeros_d" => $travellers,
            "duracion_d" => $this->values_trip_length,
            "el_nombre" => $this->name,
            "el_email" => $this->email,
            "el_fecha" => $formattedDate, // O puedes usar $this->travel_day si es relevante
            "el_telefono" => $this->phone,
            "el_textarea" => $this->comment,
            'codigo_pais' => $this->phonecountry,
            'device' => $this->device,
            'browser' => $this->browser,
            'origen' => "Web",
            'producto' => "gotoperu.com",
            'inquire_date' => $inquireDate
        ];

        $data2 = [
            "product_id" => 1,
            "package"=>'',
            "hotel_category" => array_values(array_filter($this->values_categories)),
            "destinations" => [],
            "passengers" => $travellers,
            "duration" => array_values($this->values_trip_length),
            "travel_date"=>$formattedDate,
            "country"=>$this->country,
            "country_code"=>$this->phonecountry,
            "device"=>$this->device,
            "origin"=>"Web",
            "browser"=>$this->browser,
            "name"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "comment"=>$g1Comment,
            "initial_price"=>0,
            "inquiry_date"=>$inquireDate,
            "dialCode"=>'',

        ];

//        dd($data2);



        try {
            $response2 = Http::post('https://app.g1.agency/api/v1/leads/', $data2);

//        dd($response2->json());
            // Enviar los datos al servicio mediante una solicitud HTTP POST
//            $response = Http::post('https://api.gotoecuador.com/api/store/inquire', $data);
            if ($response2->successful()) {
                if ($this->marketingHome) {
                    $analyticsTravellers = is_scalar($travellers) ? filter_var($travellers, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) : false;
                    $analyticsCategories = array_unique(array_map('strval', array_filter($this->values_categories, function ($value) {
                        return in_array($value, ['3', '4', '5', 3, 4, 5], true);
                    })));
                    sort($analyticsCategories, SORT_STRING);
                    $this->dispatchBrowserEvent('gtp:generate-lead', array_filter([
                        'lead_event_id' => (string) \Illuminate\Support\Str::uuid(),
                        'first_landing_type' => $attribution['First Landing Type'],
                        'conversion_page_type' => 'home',
                        'cta_source' => $attribution['CTA Source'],
                        'number_travelers' => $analyticsTravellers === false ? null : $analyticsTravellers,
                        'hotel_category' => implode('|', $analyticsCategories),
                    ], function ($value) { return $value !== null && $value !== ''; }));
                }
                Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $this->name], function ($messaje) {
                    $messaje->to($this->email, $this->name)
                        ->subject('GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });
                Mail::send(['html' => 'notifications.page.admin-form-footer'], [

                    'category_all' => implode(', ', $this->values_categories),
                    'travellers_all' => $travellers,
                    'trip_length' => implode(', ', $this->values_trip_length),
                    'travel_day_all' => $this->travel_day,
                    'comentario' => $this->comment,
                    'attribution' => $attribution,
                    'nombre' => $this->name,
                    'email' => $this->email,
                    'telefono' => $this->phone,
                    'code' => $this->phonecountry,
                    'device' => $this->device,
                    'browser' => $this->browser

                ], function ($messaje) use ($from) {
                    $messaje->to($from, 'GotoPeru')
                        ->subject('GotoPeru')
                        //                    ->cc($from2, 'GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });

                $this->reset('values_categories');
                $this->reset('values_number');
                $this->reset('values_number_input');
                $this->reset('values_trip_length');
                $this->reset('travel_day');
                $this->reset('comment');
                $this->reset('name');
                $this->reset('email');
                $this->reset('phone');
                $this->reset('phonecountry');

                $this->success = __('message.msg_email');
            } else {
                // Manejo de errores
//                $this->addError('error', 'Hubo un problema enviando la información al servicio.');
                $this->addError('api_error', 'Uno de los servicios falló');
                Log::error('Uno de los servicios falló', [
//                    'response1_status' => $response->status(),
                    'response2_status' => $response2->status(),
//                    'response1' => $response->body(),
                    'response2' => $response2->body(),
                ]);
            }

        }catch (\Throwable $e) {
            Log::error('Error al enviar datos a los servicios', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            $this->addError('api_error', 'Ocurrió un error al enviar los datos.');
        }



    }

    public function load_submit(){
        return 'loading';
    }

}
