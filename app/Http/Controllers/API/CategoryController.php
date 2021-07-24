<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TCategoria;
use App\Models\TTestimonio;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $category = TCategoria::all();
        return $category;
    }
}
