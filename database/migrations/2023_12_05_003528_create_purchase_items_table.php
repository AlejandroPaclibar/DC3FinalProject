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

    Schema::create('purchase_items', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('merchandise_id')->unsigned();
        $table->bigInteger('purchase_id')->unsigned();
        $table->integer('whole_sale_qty');
        $table->decimal('purchase_price');
        $table->foreign('merchandise_id')->references('id')->on('merchandises')->onDelete('cascade');
        $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
        $table->timestamps();
    });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::dropIfExists('purchase_items');
}
};
