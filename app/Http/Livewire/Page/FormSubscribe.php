<?php

namespace App\Http\Livewire\Page;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormSubscribe extends Component
{

    public $name, $email, $success;

    public function render()
    {
        return view('livewire.page.form-subscribe');
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $from = 'info@gotoperu.com';


        Mail::send(['html' => 'notifications.page.response-subscribe'], ['name' => $this->name], function ($messaje) {
            $messaje->to($this->email, $this->name)
                ->subject('GotoPeru')
                /*->attach('ruta')*/
                ->from('info@gotoperu.com', 'GotoPeru');
        });
        Mail::send(['html' => 'notifications.page.admin-form-subscribe'], [
            'nombre' => $this->name,
            'email' => $this->email,

        ], function ($messaje) use ($from) {
            $messaje->to($from, 'GotoPeru')
                ->subject('GotoPeru')
//                    ->cc($from2, 'GotoPeru')
                /*->attach('ruta')*/
                ->from('info@gotoperu.com', 'GotoPeru');
        });


        $this->reset('name');
        $this->reset('email');


        $this->success = 'Thank you for reaching out to us!';

    }


    public function load_submit(){
        return 'loading';
    }
}
