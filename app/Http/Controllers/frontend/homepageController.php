<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    function index(){
        $products = Product::get();
        $catecogies=Categories::get();
        return view('frontend.home.index',compact('catecogies','products'));
    }
}
