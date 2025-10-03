<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Models\Product;  
use Illuminate\Http\Request;
class ProductController extends Controller
{   
    public function ndex()
    {
        $products = product::all(); // You can add pagination later
        return view('products.index', compact('products'));
    }

    public function idex()
    {
        // Toa products zote
        //$products = Product::latest()->get();
        $products = Product::paginate(12);
        // Return index view na data
        return view('products.index', compact('products'));
    }
   
public function howImage($filename)
{
    $path = storage_path('app/public/products/' . $filename);
    if (!file_exists($path)) abort(404);
    return response()->file($path);
}

public function showImage($path)
{
    $path = '/private/products/' . $path;

    if (!Storage::disk('local')->exists($path)) {
        abort(404);
    }

    return response()->file(storage_path('app/' . $path));
}
public function rivateImage($filename)
{
    $path = 'private/' . $filename;

    if (!Storage::exists($path)) {
        abort(404);
    }

    $file = Storage::get($path);
    $type = Storage::mimeType($path);

    return response($file, 200)->header('Content-Type', $type);
}   
//
}


