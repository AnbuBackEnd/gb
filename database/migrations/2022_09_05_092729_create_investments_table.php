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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('client_email_id')->nullable();
            $table->decimal('invest_amount', 5, 2)->default(0);
            $table->date('invest_date')->nullable();
            $table->decimal('returns', 5, 2)->default(0);
            $table->integer('tenure')->default(0);
            $table->integer('locked_period')->default(0);
            $table->integer('admin_email_id')->default(0);
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
        Schema::dropIfExists('investments');
    }
};
