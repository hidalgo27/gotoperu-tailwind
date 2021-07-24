<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\TDestino;
use App\Models\TPaquete;
use App\Models\TTestimonio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        $paquete_recommended = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')
            ->where('estado', '1')
            ->get();

        $testinomials = TTestimonio::all();

        $paquetes_features = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')
            ->where('offers_home', '1')
            ->get();

        return view('page.home',
            compact(
                'paquete_recommended',
                'testinomials',
                'paquetes_features'
            ));
    }

    public function packages() {
        $paquetes_api = TPaquete::all();
//        $paquetes_api = $paquetes_api->json();
        return view('page.packages',
            compact(
                'paquetes_api'
            ));
    }

    public function packages_detail($url) {
        $paquetes_api = Http::get(env('APP_URL').'/api/packages/'.$url);
        $paquetes_api = $paquetes_api->json();
        return view('page.detail',
            compact(
                'paquetes_api'
            ));
    }

    public function destinations() {
        $destinations = TDestino::all();
        return view('page.destination', compact('destinations'));
    }

    public function destinations_show(TDestino $destinations) {
//        return $destinations->id;
        $paquetes_api = Http::get(env('APP_URL').'/api/packages/destinations/'.$destinations->id);
        $paquetes_api = $paquetes_api->json();

//        return $paquetes_api;

        return view('page.destination-show', compact('paquetes_api', 'destinations'));
    }
}
