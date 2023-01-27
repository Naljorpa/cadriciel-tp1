<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //source pour le foreign key https://stackoverflow.com/questions/26437342/laravel-migration-best-way-to-add-foreign-key
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('addresse');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('date_de_naissance');
            // $table->integer('ville_id');
            $table->foreignId('ville_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('etudiants');
    }
}
