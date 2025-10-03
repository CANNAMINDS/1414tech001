<?php

namespace App\Filament\Resources\Products;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Filament\Resources\Products\Schemas\ProductForm;
use App\Filament\Resources\Products\Tables\ProductsTable;
use App\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;



class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';
    public static function orm(Schema $schema): Schema
    
    {
    
    }

    public static function form(Schema $schema): Schema

    {
        return ProductForm::configure($schema);
        return $form->schema([
            FileUpload::make('image')
            ->image()
            ->directory('products')
            ->required()
            ->imageEditor()
            ->preserveFilenames()
            ->maxSize(1024)
            ->columnSpanFull(),

            TextInput::make('name')
                ->required()
                ->maxLength(255),

            Textarea::make('description')
                ->rows(3),

            TextInput::make('price')
                ->numeric()
                ->required()
                ->prefix('$'),

            Toggle::make('is_active')
                ->label('Active')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
    return ProductsTable::configure($table);
        
    return $table
    ->columns([
        ImageColumn::make('image')
            ->label('Image')
            ->circular()
            ->size(40),
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('price')->money(),
        IconColumn::make('is_active')
            ->boolean()
            ->label('Active'),
        TextColumn::make('created_at')->dateTime(),
    ])
    ->defaultSort('created_at', 'desc');
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
