<?php

namespace App\Models;
use App\Models\HasFactor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'image',
        'name',
        'description',
        'price',
        'is_active',
        
    ];
    //
}
