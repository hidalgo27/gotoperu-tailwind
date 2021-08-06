<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\TDestino;
use App\Models\THotel;
use App\Models\TPaquete;
use App\Models\TPaqueteDestino;
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
                'paquetes_features',

            ));
    }

    public function packages() {
        $paquetes = TPaquete::where('is_p_t', '1')->get();
        return view('page.packages',
            compact(
                'paquetes'
            ));
    }

    public function packages_detail($url) {
//        $paquetes_api = Http::get(env('APP_URL').'/api/packages/'.$url);
//        $paquetes_api = $paquetes_api->json();

        $paquetes = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos.destino_imagen','paquetes_categoria.categoria', 'precio_paquetes', 'paquete_itinerario')
            ->where('url', $url)
            ->get();

        return view('page.detail',
            compact(
                'paquetes'
            ));
    }

    public function destinations() {
        $destinations = TDestino::all();
        return view('page.destination', compact('destinations'));
    }

    public function destinations_show(TDestino $destinations) {
//        return $destinations->id;
//        $paquetes_api = Http::get(env('APP_URL').'/api/packages/destinations/'.$destinations->id);
//        $paquetes_api = $paquetes_api->json();

//        $paquetes = TPaquete::where('is_p_t', 1)
//            ->paquetes_destinos($destinations->id)
////            ->latest('id')
//            ->paginate(8);
//
//
//        return $paquetes;
        $paquetes_api = TPaqueteDestino::
        with('paquetes.precio_paquetes','destinos', 'paquetes.paquetes_destinos.destinos')
            ->where('iddestinos', $destinations->id)
            ->get();


        return view('page.destination-show', compact('paquetes_api', 'destinations'));
    }

    public function about(){
        return view('page.about');
    }
    public function book(){
        return view('page.book');
    }
    public function confidence(){
        return view('page.confidence');
    }
    public function conditions(){
        return view('page.conditions');
    }
    public function faq(){
        $faqs = Faq::all();
        return view('page.faq', compact('faqs'));
    }



    public function hotels(){
        $hotels = THotel::all();
        return view('page.hotels', compact('hotels'));
    }

    public function responsability(){
        return view('page.responsability');
    }

    public function reviews(){
        $testinomials = TTestimonio::all();
        return view('page.reviews', compact('testinomials'));
    }

    public function tours(){
        $paquetes = TPaquete::where('is_p_t', '0')->get();

        return view('page.tours',
            compact(
                'paquetes'
            ));
    }
}
