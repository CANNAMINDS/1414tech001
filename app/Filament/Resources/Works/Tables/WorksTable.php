<?php

namespace App\Filament\Resources\Works\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;


class WorksTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('title'),
                    
                    
                TextColumn::make('details'),
                    
                ImageColumn::make('image')
    
                    //->directory('products')
                    //->required()
                    //->imageEditor()
                    ->label('Image')
                    ->size(99)
                    //->circular()
                    ->columnSpanFull(),
                //
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
