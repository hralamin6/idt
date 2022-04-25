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
            $table->double('mass')->nullable();
            $table->double('boiling_point')->nullable();
            $table->string('category')->nullable();
            $table->double('density')->nullable();
            $table->string('discovered_by')->nullable();
            $table->double('melting_point')->nullable();
            $table->double('molar_heat')->nullable();
            $table->integer('number')->nullable();
            $table->integer('period')->nullable();
            $table->string('phase')->nullable();
            $table->string('source')->nullable();
            $table->text('summary')->nullable();
            $table->string('symbol')->nullable();
            $table->integer('group')->nullable();
            $table->string('shells')->nullable();
            $table->string('electron_configuration')->nullable();
            $table->double('electron_affinity')->nullable();
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

























