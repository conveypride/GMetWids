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
        Schema::create('add_five_day_forecasts', function (Blueprint $table) {
            $table->id();
            $table->longText('date');
            $table->longText('min_temp');
            $table->longText('max_temp');
            $table->longText('weather');
            $table->longText('forecaster');
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
        Schema::dropIfExists('add_five_day_forecasts');
    }
};
