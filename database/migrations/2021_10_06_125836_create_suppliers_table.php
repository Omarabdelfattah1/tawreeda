<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('state');
            $table->string('email')->nullable();
            $table->string('phones')->nullable();
            $table->integer('employees_number')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('team_photo')->nullable();
            $table->string('company_CRN')->nullable();
            $table->string('company_TXCard')->nullable();
            $table->string('company_cataloge')->nullable();
            $table->string('company_address')->nullable();
            $table->boolean('verified')->default(false);
            $table->text('team_description')->nullable();
            $table->text('about')->nullable();
            $table->text('quality')->nullable();
            $table->text('production')->nullable();
            $table->string('type')->nullable();
            $table->string('slug')->nullable()->unique();
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
        Schema::dropIfExists('suppliers');
    }
}
