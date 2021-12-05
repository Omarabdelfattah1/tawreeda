<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagproducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constraind();
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('supplier_tagproduct', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagproduct_id')->constraind();
            $table->foreignId('supplier_id')->constraind();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_tagproduct');
        Schema::dropIfExists('tagproducts');
    }
}
