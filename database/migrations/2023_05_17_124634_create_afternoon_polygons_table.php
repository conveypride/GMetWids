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
        Schema::create('afternoon_polygons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('add_daily_forecast_id');
            $table->longText('afternoonDate');
            $table->longText('polygonId');
            $table->longText('color');
            $table->json('cordinate');
            $table->timestamps();
 // Define foreign key constraint
 $table->foreign('add_daily_forecast_id')->references('id')->on('add_daily_forecasts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afternoon_polygons');
    }
};
