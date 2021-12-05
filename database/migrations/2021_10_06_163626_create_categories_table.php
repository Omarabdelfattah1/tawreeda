<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constraind();
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constraind();
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });
        Schema::create('category_supplier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constraind();
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('department');
        Schema::dropIfExists('category_supplier');
        Schema::dropIfExists('categories');
    }
}
