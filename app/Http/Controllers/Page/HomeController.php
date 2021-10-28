<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\TDestino;
use App\Models\THotel;
use App\Models\TPaquete;
use App\Models\TPaqueteDestino;
use App\Models\TPost;
use App\Models\TTeam;
use App\Models\TTestimonio;
use App\Models\TSeo;
use App\Models\THotelDestino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

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

        $blogs_first = TPost::latest('id')->first();

        //SEO
        SEOMeta::setTitle(__('message.seo_title'));

        return view('page.home',
            compact(
                'paquete_recommended',
                'testinomials',
                'paquetes_features',
                'blogs_first'

            ));
    }
    public function packages() {
        $paquetes = TPaquete::where('is_p_t', '1')->get();
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
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
        //SEO
        $seo=TSeo::where('estado','1')->where('id_t',$paquetes->first()->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->og_tipo);
            OpenGraph::addProperty('locale', $seo->first()->localizacion);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);
            
            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }else{
            SEOMeta::setTitle($paquetes->first()->titulo);
            SEOMeta::setCanonical(route('packages.all').'/'.$url);

            OpenGraph::setTitle($paquetes->first()->titulo);
            OpenGraph::setUrl(route('packages.all').'/'.$url);
            OpenGraph::addImage($paquetes->first()->imagen, ['height' => 400, 'width' => 550]);
        }
        return view('page.detail',
            compact(
                'paquetes'
            ));
    }

    public function destinations() {
        $destinations = TDestino::all();
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
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
        //SEO
        $seo=TSeo::where('estado','2')->where('id_t',$destinations->first()->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->tipo);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);
        
            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }else{
            SEOMeta::setTitle($destinations->first()->nombre);
            SEOMeta::setCanonical(route('destinations.all').'/'.$destinations->url);

            OpenGraph::setTitle($destinations->first()->nombre);
            OpenGraph::setUrl(route('destinations.all').'/'.$destinations->url);
            OpenGraph::addImage($destinations->first()->imagen, ['height' => 900, 'width' => 800]);
        }

        return view('page.destination-show', compact('paquetes_api', 'destinations'));
    }

    public function about(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        $teams = TTeam::all();
        return view('page.about', compact('teams'));
    }
    public function book(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        return view('page.book');
    }
    public function confidence(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        return view('page.confidence');
    }
    public function conditions(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        return view('page.conditions');
    }
    public function faq(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        $faqs = Faq::all();
        return view('page.faq', compact('faqs'));
    }

    public function hotels(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        $hotels = THotel::all();
        return view('page.hotels', compact('hotels'));
    }

    public function responsability(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        return view('page.responsability');
    }

    public function reviews(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        $testinomials = TTestimonio::all();
        return view('page.reviews', compact('testinomials'));
    }

    public function tours(){
        $paquetes = TPaquete::where('is_p_t', '0')->get();
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        return view('page.tours',
            compact(
                'paquetes'
            ));
    }
    public function blog(){
        //SEO
        SEOMeta::setTitle(__('message.seo_title'));
        $blogs = TPost::latest('id')->get();
        $blogs_first = TPost::latest('id')->first();
        return view('page.blog', compact('blogs_first','blogs'));
    }
    public function blog_show(TPost $post){
        //SEO
        $seo=TSeo::where('estado','0')->where('id_t',$post->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->og_tipo);
            OpenGraph::addProperty('locale', $seo->first()->localizacion);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);
            
            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }else{
            SEOMeta::setTitle($post->titulo);
            SEOMeta::setCanonical(route('blog').'/'.$post->url);

            OpenGraph::setTitle($post->titulo);
            OpenGraph::setUrl(route('blog').'/'.$post->url);
            OpenGraph::addImage($post->imagen_miniatura, ['height' => 280, 'width' => 420]);
        }
        return view('page.blog-show', compact('post'));
    }
}
