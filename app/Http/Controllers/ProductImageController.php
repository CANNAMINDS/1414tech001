<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductImageController;
use App\Models\Product;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class roductImageController extends Controller
{
    //
}

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{   
    public function show($path)
    {$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            abort(403, 'Unsupported file type.');
        }
        // ✅ Optional: restrict to specific folder
        if (!str_starts_with($path, 'private/products/')) {
            abort(403, 'Access denied.');
        }

        $fullPath = storage_path('app/' . $path);

        if (!file_exists($fullPath)) {
            abort(404, 'File not found.');
        }

        return response()->file($fullPath);
    }
}
