<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TDestino;
use App\Models\TTestimonio;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function testimonial(){
        $testimonial = TTestimonio::all();
        return $testimonial;
    }
}
