<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned()->nullable();
            $table->integer('vet_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('kind');
            $table->integer('age')->nullable();
            $table->string('gender');
            $table->boolean('is_vaccinated')->default(false);
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('set null');
            $table->foreign('vet_id')->references('id')->on('vets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
