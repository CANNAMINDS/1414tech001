<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Work extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'image',
    ];
}
