<?php

namespace App\Filament\Resources\Works;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Filament\Resources\Works\Pages\CreateWork;
use App\Filament\Resources\Works\Pages\EditWork;
use App\Filament\Resources\Works\Pages\ListWorks;
use App\Filament\Resources\Works\Schemas\WorkForm;
use App\Filament\Resources\Works\Tables\WorksTable;
use App\Models\Work;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class WorkResource extends Resource
{
    protected static ?string $model = Work::class;
    
    protected static ?string $navigationLabel = 'My Works';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WorkForm::configure($schema);
        return $form->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('details')
                    ->rows(5)
                    ->maxLength(1000),

                FileUpload::make('image')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->directory('works') // stored in storage/app/public/works
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return WorksTable::configure($table);
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->square()
                    ->width(60),
                
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('F j, Y'),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorks::route('/'),
            'create' => CreateWork::route('/create'),
            'edit' => EditWork::route('/{record}/edit'),
        ];
    }
}
