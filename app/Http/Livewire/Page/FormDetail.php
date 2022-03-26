<?php

namespace App\Http\Livewire\Page;

use App\Models\TCategoria;
use App\Models\TDestino;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormDetail extends Component
{

    public $name, $email, $phone, $comment, $success, $paquete;

    public function render()
    {
        return view('livewire.page.form-detail');
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $from = 'english@gotoperu.com';


        Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $this->name], function ($messaje) {
            $messaje->to($this->email, $this->name)
                ->subject('GotoPeru')
                /*->attach('ruta')*/
                ->from('english@gotoperu.com', 'GotoPeru');
        });
        Mail::send(['html' => 'notifications.page.admin-form-contact-detail'], [
            'paquete' => $this->paquete,
            'nombre' => $this->name,
            'email' => $this->email,
            'telefono' => $this->phone,
            'comentario' => $this->comment,

        ], function ($messaje) use ($from) {
            $messaje->to($from, 'GotoPeru')
                ->subject('GotoPeru')
//                    ->cc($from2, 'GotoPeru')
                /*->attach('ruta')*/
                ->from('english@gotoperu.com', 'GotoPeru');
        });


        $this->reset('name');
        $this->reset('email');
        $this->reset('phone');
        $this->reset('comment');


        $this->success = __('message.msg_email');

    }


    public function load_submit(){
        return 'loading';
    }
}
