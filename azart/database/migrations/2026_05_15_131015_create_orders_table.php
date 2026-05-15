<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number')->unique();
            $table->string('status')->default('pending');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->default('mollie');
            $table->string('payment_reference')->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_address_line_1')->nullable();
            $table->string('shipping_address_line_2');
            $table->string('shipping_postal_code');
            $table->string('shipping_city'); // merge city and state into one field for simplicity
            $table->string('shipping_country')->nullable();
            $table->foreignId('shipping_zone_id')->nullable()->constrained('shipping_zones')->onDelete('set null');
            $table->unsignedInteger('subtotal_cents');
            $table->unsignedInteger('shipping_cents');
            $table->unsignedInteger('total_cents');
            $table->string('currency', 3)->default('EUR');
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
