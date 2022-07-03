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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('date');
            $table->boolean('stress')->nullable()->default(0);
            $table->boolean('low_water_intake')->nullable()->default(0);
            $table->boolean('chocolate')->nullable()->default(0);
            $table->boolean('cheese')->nullable()->default(0);
            $table->boolean('yeast_goods')->nullable()->default(0);
            $table->boolean('yoghurt')->nullable()->default(0);
            $table->boolean('fruit')->nullable()->default(0);
            $table->boolean('nuts')->nullable()->default(0);
            $table->boolean('olives')->nullable()->default(0);
            $table->boolean('tomato')->nullable()->default(0);
            $table->boolean('soy')->nullable()->default(0);
            $table->boolean('vinegar')->nullable()->default(0);
            $table->text('medication')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('diaries');
    }
};
