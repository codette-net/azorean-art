<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Status & Payment')
                    ->schema([
                        TextInput::make('order_number')
                            ->required()
                            ->numeric(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending')
                            ->required(),
                        Select::make('payment_status')
                            ->options(['pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed'])
                            ->default('pending')
                            ->required(),
                        TextInput::make('payment_method')
                            ->required()
                            ->default('mollie'),
                        TextInput::make('payment_reference'),
                        TextInput::make('subtotal_cents')
                            ->required()
                            ->numeric(),
                        TextInput::make('shipping_cents')
                            ->required()
                            ->numeric(),
                        TextInput::make('total_cents')
                            ->required()
                            ->numeric(),
                        TextInput::make('currency')
                            ->required()
                            ->default('EUR'),
                        Textarea::make('notes')
                            ->columnSpanFull(),
                    ])->columns(2),
                Group::make()->schema([
                    Section::make('Customer Details')
                        ->schema([
                            TextInput::make('customer_name')
                                ->required(),
                            TextInput::make('customer_email')
                                ->email()
                                ->required(),
                            TextInput::make('customer_phone')
                                ->tel()
                        ]),
                    Section::make('Shipping Details')
                        ->schema([
                            TextInput::make('shipping_name'),
                            TextInput::make('shipping_address_line_1'),
                            TextInput::make('shipping_address_line_2')
                                ->required(),
                            TextInput::make('shipping_postal_code')
                                ->required(),
                            TextInput::make('shipping_city')
                                ->required(),
                            TextInput::make('shipping_country'),
                            Select::make('shipping_zone_id')
                                ->relationship('shippingZone', 'name')
                        ])
                ]),

            ]);
    }
}
