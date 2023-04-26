<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_detail', function (Blueprint $table) {
            $table->string('invoiceId');
            $table->string('itemId');
            $table->integer('quantity');
            $table->timestamps();
            $table->primary(['invoiceId', 'itemId']);
            $table->foreign('invoiceId')->references('invoiceId')->on('facture_header');
            $table->foreign('itemId')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture_detail');
    }
};
