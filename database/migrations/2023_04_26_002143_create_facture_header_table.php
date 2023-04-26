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
        Schema::create('facture_header', function (Blueprint $table) {
            $table->string('invoiceId');
            $table->string('userId');
            $table->string('address', 100);
            $table->string('postalCode', 5);
            $table->timestamps();
            $table->primary('invoiceId');
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facture_header');
    }
};
