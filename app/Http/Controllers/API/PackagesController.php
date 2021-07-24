<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TPaquete;
use App\Models\TPaqueteDestino;
use App\Models\TpaqueteItinerario;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function packages() {
        $paquete = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')
            ->get();
        return $paquete;
    }

    public function packages_detail($url) {
        $paquete = TPaquete::
        with('imagen_paquetes','paquetes_destinos.destinos.destino_imagen','paquetes_categoria.categoria', 'precio_paquetes')
            ->where('url', $url)
            ->get();
        return $paquete;
    }

//    public function itinerary($id) {
//        $paquete = TPaquete::
//        with('paquete_itinerario.itinerarios','imagen_paquetes','paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')
//            ->where('id', $id)
//            ->get();
//        return $paquete;
//    }
    public function itinerary($id) {
        $p_itinerary = TpaqueteItinerario::with('itinerarios')->where('idpaquetes', $id)->get();
        return $p_itinerary;
    }

    public function destinos_show($destino) {
        $paquete = TPaqueteDestino::
        with('paquetes.precio_paquetes','destinos', 'paquetes.paquetes_destinos.destinos')
            ->where('iddestinos', $destino)
            ->get();
        return $paquete;
    }
}
