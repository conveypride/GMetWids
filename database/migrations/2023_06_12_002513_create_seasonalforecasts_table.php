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
        Schema::create('seasonalforecasts', function (Blueprint $table) {
            $table->id();
            $table->text('seasonalId')->nullable();
            $table->text('filename1')->nullable();
            $table->text('url1')->nullable();
            $table->text('filename2')->nullable();
            $table->text('url2')->nullable();
            $table->text('filename3')->nullable();
            $table->text('url3')->nullable();
            $table->text('filename4')->nullable();
            $table->text('url4')->nullable();
            $table->text('pdfname')->nullable();
            $table->text('pdfurl')->nullable();
             $table->text('summary')->nullable();
             $table->text('datestart')->nullable();
             $table->text('dateend')->nullable();
            $table->text('forecaster')->nullable();
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
        Schema::dropIfExists('seasonalforecasts');
    }
};
