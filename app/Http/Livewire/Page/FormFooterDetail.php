<?php

namespace App\Http\Livewire\Page;

use App\Models\TCategoria;
use App\Models\TDestino;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class FormFooterDetail extends Component
{
    public $values_categories = [], $values_number, $values_trip_length, $travel_day, $comment, $name, $email, $phone, $country, $phonecountry, $values_number_input, $success, $paquete, $device, $browser;

    // Authenticated snapshot of this form's initial request; never shared through session/cookies.
    public $attributionContext;
    public $ctaSource = 'form';

    private const ATTRIBUTION_QUERY_KEYS = [
        'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'gclid', 'fbclid',
    ];

    private const ATTRIBUTION_LABELS = [
        'package_id' => 'Package ID',
        'package_slug' => 'Package Slug',
        'campaign_id' => 'Campaign ID',
        'campaign_slug' => 'Campaign Slug',
        'utm_source' => 'UTM Source',
        'utm_medium' => 'UTM Medium',
        'utm_campaign' => 'UTM Campaign',
        'utm_content' => 'UTM Content',
        'utm_term' => 'UTM Term',
        'gclid' => 'GCLID',
        'fbclid' => 'FBCLID',
        'landing_url' => 'Landing',
        'cta_source' => 'CTA Source',
    ];

    public function mount($packageId = null, $packageSlug = null, $campaignId = null, $campaignSlug = null)
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

        // IDs/slugs are passed by the server-rendered package view, not read from the query string.
        $context = [
            'component_id' => $this->id,
            'package_id' => $packageId,
            'package_slug' => $packageSlug,
            'campaign_id' => $campaignId,
            'campaign_slug' => $campaignSlug,
            'landing_url' => request()->getPathInfo(),
        ];
        $query = request()->query();
        foreach (self::ATTRIBUTION_QUERY_KEYS as $key) {
            $context[$key] = $this->normalizeAttributionValue($query[$key] ?? null, $key);
        }
        $this->validateAttributionContext($context);
        $this->attributionContext = Crypt::encryptString(json_encode($context, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE));
    }

    protected function normalizeAttributionValue($value, $key)
    {
        if (!is_string($value) || !mb_check_encoding($value, 'UTF-8')) {
            return null;
        }

        if (in_array($key, ['gclid', 'fbclid'], true)) {
            // Preserve valid opaque click IDs byte-for-byte; reject invalid/oversized values, never truncate.
            return $value !== '' && mb_strlen($value) <= 512
                && !preg_match('/[<>\x00-\x20\x7F]/u', $value) ? $value : null;
        }

        $value = trim(preg_replace('/[\x00-\x1F\x7F]+/u', ' ', strip_tags($value)) ?? '');
        return $value === '' ? null : mb_substr($value, 0, 255);
    }

    protected function validateAttributionContext($context)
    {
        $rules = [
            'component_id' => 'required|string|max:100',
            'package_id' => 'nullable|integer|min:1|required_with:campaign_id',
            'package_slug' => 'nullable|string|max:255|required_with:package_id|not_regex:/[<>\x00-\x1F\x7F]/',
            'campaign_id' => 'nullable|integer|min:1|required_with:campaign_slug',
            'campaign_slug' => 'nullable|string|max:120|required_with:campaign_id|not_regex:/[<>\x00-\x1F\x7F]/',
            'landing_url' => 'required|string|max:1024|starts_with:/|not_regex:/[<>?\x00-\x1F\x7F]/',
        ];
        foreach (self::ATTRIBUTION_QUERY_KEYS as $key) {
            $rules[$key] = 'nullable|string|max:' . (in_array($key, ['gclid', 'fbclid'], true) ? 512 : 255);
        }
        if (!is_array($context) || Validator::make($context, $rules)->fails()
            || ($context['component_id'] ?? null) !== $this->id) {
            throw ValidationException::withMessages(['api_error' => 'Please refresh the page and try again.']);
        }
    }

    public function updatingAttributionContext()
    {
        // The initial snapshot is read-only; only the allowlisted CTA source can change in the browser.
        throw ValidationException::withMessages(['api_error' => 'Please refresh the page and try again.']);
    }

    protected function leadAttribution()
    {
        try {
            if (!is_string($this->attributionContext) || strlen($this->attributionContext) > 32768) {
                throw new \UnexpectedValueException('Invalid attribution snapshot.');
            }
            $context = json_decode(Crypt::decryptString($this->attributionContext), true, 512, JSON_THROW_ON_ERROR);
        } catch (\Throwable $exception) {
            throw ValidationException::withMessages(['api_error' => 'Please refresh the page and try again.']);
        }

        $this->validateAttributionContext($context);
        $hasAttribution = ($context['campaign_id'] ?? null) !== null;
        foreach (self::ATTRIBUTION_QUERY_KEYS as $key) {
            $context[$key] = $this->normalizeAttributionValue($context[$key] ?? null, $key);
            $hasAttribution = $hasAttribution || $context[$key] !== null;
        }
        if (!$hasAttribution) {
            return [];
        }

        $context['cta_source'] = $this->ctaSource;
        $attribution = [];
        foreach (self::ATTRIBUTION_LABELS as $key => $label) {
            if (($context[$key] ?? null) !== null) {
                $attribution[$label] = $context[$key];
            }
        }
        return $attribution;
    }

    public function render()
    {
        $destinations = TDestino::all();
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

//        ,
//        [
//            'star'=>'2',
//            'category'=>__('message.form_footer_par18')
//        ]

        return view('livewire.page.form-footer-detail', compact('destinations','categories', 'number','trip_lengths','hotels'));
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'nullable|string',
            'ctaSource' => 'required|string|in:hero,rail,final,form',
        ]);

        $attribution = $this->leadAttribution();
        $g1Comment = $this->comment;
        if ($attribution) {
            $lines = [];
            foreach ($attribution as $label => $value) {
                $lines[] = $label . ': ' . $value;
            }
            // G1's existing comment field is supported; no additional API fields are assumed.
            $block = "[Campaign Attribution]\n" . implode("\n", $lines) . "\n[/Campaign Attribution]";
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
            'package' => $this->paquete,
            "category_d" => array_filter($this->values_categories),
            "destino_d" => [], // Aquí puedes agregar los destinos si los tienes
            "pasajeros_d" => $travellers,
            "duracion_d" => [],
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
            "package"=>$this->paquete,
            "hotel_category" => array_values(array_filter($this->values_categories)),
            "destinations" => [],
            "passengers" => $travellers,
            "duration" => [],
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

        try {
            $response2 = Http::post('https://app.g1.agency/api/v1/leads/', $data2);
            // Enviar los datos al servicio mediante una solicitud HTTP POST
//            $response = Http::post('https://api.gotoecuador.com/api/store/inquire', $data);

            if ($response2->successful()) {


                Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $this->name], function ($messaje) {
                    $messaje->to($this->email, $this->name)
                        ->subject('GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });
                Mail::send(['html' => 'notifications.page.admin-form-footer-detail'], [
                    'paquete' => $this->paquete,
                    'category_all' => implode(', ', $this->values_categories),
                    'travellers_all' => $travellers,
//                'trip_length' => implode(', ', $this->values_trip_length),
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
//            $this->reset('values_trip_length');
                $this->reset('travel_day');
                $this->reset('comment');
                $this->reset('name');
                $this->reset('email');
                $this->reset('phone');
                $this->reset('phonecountry');

                $this->success = __('message.msg_email');
            } else {
                // Manejo de errores
                $this->addError('api_error', 'Uno de los servicios falló');
                Log::error('Uno de los servicios falló', [
                    'response1_status' => $response->status(),
                    'response2_status' => $response2->status(),
                    'response1' => $response->body(),
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
