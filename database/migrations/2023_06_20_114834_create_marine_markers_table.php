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
        Schema::create('marine_markers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marine_forecast_id');
            $table->longText('date');
            $table->longText('markersId');
            $table->longText('icontype');
            $table->longText('lat');
            $table->longText('lng');
            $table->timestamps();
            
              // Define foreign key constraint
 $table->foreign('marine_forecast_id')->references('id')->on('marine_forecasts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marine_markers');
    }
};
