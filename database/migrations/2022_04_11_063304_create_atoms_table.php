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
        Schema::create('atoms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('appearance')->nullable();
            $table->double('atomic_mass')->nullable();
            $table->double('boil')->nullable();
            $table->string('category')->nullable();
            $table->double('density')->nullable();
            $table->string('discovered_by')->nullable();
            $table->double('melt')->nullable();
            $table->double('molar_heat')->nullable();
            $table->string('named_by')->nullable();
            $table->integer('number')->nullable();
            $table->integer('period')->nullable();
            $table->string('phase')->nullable();
            $table->string('source')->nullable();
            $table->string('spectral_img')->nullable();
            $table->text('summary')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('xpos')->nullable();
            $table->integer('ypos')->nullable();
            $table->string('shells')->nullable();
            $table->string('electron_configuration')->nullable();
            $table->string('electron_configuration_semantic')->nullable();
            $table->double('electron_affinity')->nullable();
            $table->double('electronegativity_pauling')->nullable();
            $table->string('ionization_energies')->nullable();
            $table->string('cpk_hex')->nullable();
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
        Schema::dropIfExists('atoms');
    }
};
