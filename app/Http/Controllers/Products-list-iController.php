<?php

namespace App\Http\Controllers;
use App\Models\Product;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductslistiController extends Controller
{    public function dcts()
    {
        //$products = product::all(); // You can add pagination later
        return view('products.products-list-i');
    }
    //
}
