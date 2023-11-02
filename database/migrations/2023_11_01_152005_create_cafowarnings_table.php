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
        Schema::create('cafowarnings', function (Blueprint $table) {
            $table->id();
            $table->longText('summary');
            $table->longText('date');     
            $table->longText('timeissued');
            $table->longText('validfrom');
            $table->longText('department');
            $table->longText('forecaster');
            $table->longText('status');
            $table->longText('areasToBeAffected1');
            $table->longText('atba1TH1Letter');
            $table->longText('atba1TH2Letter');
            $table->longText('atba1TH3Letter');
            $table->longText('atba1TH4Letter');
             $table->longText('atba1TH1Color');
            $table->longText('atba1TH2Color');
            $table->longText('atba1TH3Color');
            $table->longText('atba1TH4Color');


             $table->longText('areasToBeAffected2');
             $table->longText('atba2TH1Letter');
            $table->longText('atba2TH2Letter');
            $table->longText('atba2TH3Letter');
            $table->longText('atba2TH4Letter');
            $table->longText('atba2TH1Color');
            $table->longText('atba2TH2Color');
            $table->longText('atba2TH3Color');
            $table->longText('atba2TH4Color');

           $table->longText('areasToBeAffected3');
           $table->longText('atba3TH1Letter');
            $table->longText('atba3TH2Letter');
            $table->longText('atba3TH3Letter');
            $table->longText('atba3TH4Letter');
            $table->longText('atba3TH1Color');
            $table->longText('atba3TH2Color');
            $table->longText('atba3TH3Color');
            $table->longText('atba3TH4Color');
            




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
        Schema::dropIfExists('cafowarnings');
    }
};
