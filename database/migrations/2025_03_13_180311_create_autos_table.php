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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->year('anno');
            $table->string('marca');
            $table->string('modello');
            $table->string('tipologia');
            $table->integer('cilindrata');
            $table->integer('cavalli');
            $table->string('emissioni');
            $table->string('carburante');
            $table->integer('km')->nullable();
            $table->string('colore');
            $table->integer('posti');
            $table->integer('porte');
            $table->integer('prezzo');
            $table->boolean('nuova')->default(true);
            $table->string('foto')->nullable(); // Percorso immagine
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
