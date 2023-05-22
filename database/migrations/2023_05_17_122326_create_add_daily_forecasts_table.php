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
        Schema::create('add_daily_forecasts', function (Blueprint $table) {
            $table->id();
            $table->text('creator');
            $table->longText('publishType');
            $table->longText('scheduledate');
            $table->longText('summary');
            $table->longText('textareaweatherwarning');
            $table->longText('warningtype');
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
        Schema::dropIfExists('add_daily_forecasts');
    }
};
