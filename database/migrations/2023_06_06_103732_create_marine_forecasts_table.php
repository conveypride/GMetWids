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
        Schema::create('marine_forecasts', function (Blueprint $table) {
            $table->id();
            $table->text('creator');
            $table->longText('publishType');
            $table->longText('validAt');
            $table->longText('seaState');
            $table->longText('minMaxWaveCurrent');
            $table->longText('surfaceWind24hrsMin');
            $table->longText('surfaceWind24hrsMax');
            $table->longText('surfaceWind48hrsMin');
            $table->longText('surfaceWind48hrsMax');
            $table->longText('visibility24hrsMin');
            $table->longText('visibility24hrsMax');
            $table->longText('visibility48hrsMin');
            $table->longText('visibility48hrsMax');
            $table->longText('seaSurfTemp24hrsMin');
            $table->longText('seaSurfTemp24hrsMax');
            $table->longText('seaSurfTemp48hrsMin');
            $table->longText('seaSurfTemp48hrsMax');
            $table->longText('sigWaveHeight24hrsMin');
            $table->longText('sigWaveHeight24hrsMax');
            $table->longText('sigWaveHeight48hrsMin');
            $table->longText('sigWaveHeight48hrsMax');
            $table->longText('tidalwave24hrsMin');
            $table->longText('tidalwave24hrsMax');
            $table->longText('tidalwave48hrsMin');
            $table->longText('tidalwave48hrsMax');
            $table->longText('waveCureent24hrs');
            $table->longText('waveCureent48hrs');
            $table->longText('summary');
            $table->longText('textareaweatherwarning')->nullable();
            $table->longText('warningtype')->nullable();
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
        Schema::dropIfExists('marine_forecasts');
    }
};
