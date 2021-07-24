<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TCategoria;
use App\Models\TPaquete;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    public function category(){
        $category = TCategoria::all();
        return $category;
    }
    public function slider_home_featured(){
        $paquete = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')
            ->where('offers_home', '1')
            ->get();
        return $paquete;
    }
    public function slider_home_recommended(){
        $paquete = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')
            ->where('estado', '1')
            ->get();
        return $paquete;
    }
}
