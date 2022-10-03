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
        Schema::create('userprivileges', function (Blueprint $table) {
            $table->id();
            $table->text('role')->nullable();
            $table->text('window')->nullable();
            $table->integer('create')->default(0);
            $table->integer('edit')->default(0);
            $table->integer('view')->default(0);
            $table->integer('delete')->default(0);
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
        Schema::dropIfExists('userprivileges');
    }
};
