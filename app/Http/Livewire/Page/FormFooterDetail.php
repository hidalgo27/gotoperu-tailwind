<?php

namespace App\Http\Livewire\Page;

use App\Models\TCategoria;
use App\Models\TDestino;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormFooterDetail extends Component
{
    public $values_categories = [], $values_number, $values_trip_length, $travel_day, $comment, $name, $email, $phone, $phonecountry, $values_number_input, $success, $paquete;
    public function render()
    {
        $destinations = TDestino::all();
        $categories = TCategoria::all();

        $number = ['1','2','3','4','5'];
        $trip_lengths = ['3-5','6-8','9-11','12-16','16+'];
        $hotels = [
            [
                'star'=>'5',
                'category'=>'Luxury'
            ],
            [
                'star'=>'4',
                'category'=>'Superior'
            ],
            [
                'star'=>'3',
                'category'=>'Best Value'
            ],
            [
                'star'=>'2',
                'category'=>'Budget'
            ]
        ];


        return view('livewire.page.form-footer-detail', compact('destinations','categories', 'number','trip_lengths','hotels'));
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

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

        Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $this->name], function ($messaje) {
            $messaje->to($this->email, $this->name)
                ->subject('GotoPeru')
                /*->attach('ruta')*/
                ->from('info@gotoperu.com', 'GotoPeru');
        });
        Mail::send(['html' => 'notifications.page.admin-form-footer-detail'], [
            'paquete' => $this->paquete,
            'category_all' => $hotels_s,
            'travellers_all' => $travellers,
            'trip_length' => $this->values_trip_length,
            'travel_day_all' => $this->travel_day,
            'comentario' => $this->comment,
            'nombre' => $this->name,
            'email' => $this->email,
            'telefono' => $this->phone,
            'code' => $this->phonecountry,

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

        $this->success = 'Thank you for reaching out to us!';

    }

    public function load_submit(){
        return 'loading';
    }
}