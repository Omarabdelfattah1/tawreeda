<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constraind();
            $table->foreignId('request_id')->constraind();
            $table->string('payment_way')->default('cash-later');
            $table->boolean('delivery')->default(true);
            $table->string('state')->nullable();
            $table->integer('ready-after');
            $table->integer('available-for');
            $table->timestamps();
            $table->text('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
