<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TCategoria;
use App\Models\TDestino;
use Illuminate\Http\Request;

class FormpageController extends Controller
{
    public function destinos(){
        $destinations = TDestino::where('form', 1)->get();
        return $destinations;
    }
    public function categorias(){
        $category = TCategoria::where('form', 1)->get();
        return $category;
    }
}
