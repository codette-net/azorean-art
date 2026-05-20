<?php

namespace App\Filament\Resources\Products\RelationManagers;

use App\Enums\ProductFormatEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Product variant')
                    ->tabs([
                        Tab::make('information')
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('language')
                                    ->default('pt'),
                                Select::make('format')
                                    ->options([
                                        'softcover' => ProductFormatEnum::SOFTCOVER->value,
                                        'hardcover' => ProductFormatEnum::HARDCOVER->value,
                                        'ebook' => ProductFormatEnum::EBOOK->value,
                                    ])->default('softcover')
                            ])->columns(2),
                        Tab::make('pricing & inventory')
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
                            ])->columns(3),
                        Tab::make('additional information')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Visible')
                                    ->helperText('If unchecked, the product will not be visible in the store'),
                                DatePicker::make('published_at')
                                    ->label('Available from')
                                    ->default(now())
                            ])->columns(2),
                    ])->columnSpanFull()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('product.title')
                    ->label('Product')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('language')
                    ->searchable(),
                TextColumn::make('format')
                    ->searchable(),
                TextColumn::make('price_cents')
                    ->label('Price')
                    ->money('EUR', divideBy: 100)
                    ->sortable(),
                IconColumn::make('is_active')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    DissociateAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
