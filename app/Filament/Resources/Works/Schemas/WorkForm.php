<?php

namespace App\Filament\Resources\Works\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class WorkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
                
                    TextInput::make('title')->required(),
                    Textarea::make('details'),
                    FileUpload::make('image')->image()->directory('works'),
                ]);
                //
            
    }
}
