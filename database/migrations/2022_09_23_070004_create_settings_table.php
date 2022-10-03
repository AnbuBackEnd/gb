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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->double('invest_amount_limit', 15, 8);
            $table->integer('pastdatesallowed')->default(0);
            $table->integer('tenureperiodlimit')->default(0);
            $table->integer('interestratelimit')->default(0);
            $table->integer('maturityperiod')->default(0);
            $table->string('lastupdated')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
