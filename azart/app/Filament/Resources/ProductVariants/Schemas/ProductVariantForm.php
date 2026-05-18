<?php

namespace App\Filament\Resources\ProductVariants\Schemas;

use App\Enums\ProductFormatEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductVariantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()->schema([
                    Section::make('Product Variant Details')
                        ->schema([
                            Select::make('product_id')
                                ->relationship('product', 'title')
                                ->required()
                                ->searchable()
                                ->preload(),
                            TextInput::make('title')
                                ->required(),
                            TextInput::make('language')
                                ->default('pt'),
                            Select::make('format')
                                ->options([
                                    'softcover' => ProductFormatEnum::SOFTCOVER->value,
                                    'hardcover' => ProductFormatEnum::HARDCOVER->value,
                                    'ebook' => ProductFormatEnum::EBOOK->value,
                                ])->default('softcover'),
                        ])->columns(2),
                ]),
                Group::make()->schema([
                    Section::make('Pricing & Stock')
                        ->schema([
                            TextInput::make('sku')
                                ->label('Stock Keeping Unit')
                                ->required(),
                            TextInput::make('price_cents')
                                ->numeric()
                                ->minValue(0),
                            TextInput::make('stock')
                                ->label('Stock quantity')
                                ->numeric()
                                ->minValue(0),
                            Toggle::make('is_active')
                                ->label('Visible')
                                ->helperText('If unchecked, the product will not be visible in the store'),
                            DatePicker::make('published_at')
                                ->label('Available from')
                                ->default(now()),
                        ])->columns(2),
                ])
//                TextInput::make('product_id')
//                    ->required()
//                    ->numeric(),
//                TextInput::make('sku')
//                    ->label('SKU')
//                    ->required(),
//                TextInput::make('title')
//                    ->required(),
//                TextInput::make('language'),
//                TextInput::make('format'),
//                TextInput::make('price_cents')
//                    ->required()
//                    ->numeric(),
//                Toggle::make('is_active')
//                    ->required(),
            ]);
    }
}
