<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductFormatEnum;
use App\Models\Product;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Product Details')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->unique()
                                    ->afterStateUpdated(fn(string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null),

                                TextInput::make('slug')
                                    ->disabled()
                                    ->required()
                                    ->unique(Product::class, 'slug', ignoreRecord: true)
                                    ->dehydrated(),

                                MarkDownEditor::make('description')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Section::make('Pricing & Stock')
                            ->schema([
                                TextInput::make('sku')
                                    ->label('Stock Keeping Unit'),
                                TextInput::make('price_cents')
                                    ->numeric()
                                    ->required(),
//                                    ->rules('regex:/^\d{1,6}(\.\d{0,2})?$/'),
                                TextInput::make('stock')
                                    ->default(0)
                                    ->numeric()
                                    ->minValue(0)
                                ,
                                Select::make('format')
                                    ->options([
                                        'softcover' => ProductFormatEnum::SOFTCOVER->value,
                                        'hardcover' => ProductFormatEnum::HARDCOVER->value,
                                        'ebook' => ProductFormatEnum::EBOOK->value,
                                    ])->default('softcover'),

                            ])->columns(2),
                    ]),
                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Published')
                                    ->helperText('If unchecked, the product(s) will not be visible in the store.'),
                                DatePicker::make('published_at')
                                    ->label('Available from')
                                    ->default(now()),

                            ]),
                        Section::make('Images')
                            ->schema([
                                FileUpload::make('cover_image')
                                    ->directory('product_cover_images')
                                    ->preserveFilenames()
                                    ->image()
                                    ->imageEditor()
                            ])->collapsible(),
                    ]),

//                TextInput::make('title')
//                    ->required(),
//                TextInput::make('slug')
//                    ->required(),
//                Textarea::make('description')
//                    ->columnSpanFull(),
//                Toggle::make('is_active')
//                    ->required(),
//                FileUpload::make('cover_image')
//                    ->image(),
//                TextInput::make('base_currency')
//                    ->required()
//                    ->default('EUR'),
            ]);
    }
}
