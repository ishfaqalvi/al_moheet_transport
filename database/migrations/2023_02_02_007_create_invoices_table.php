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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('statment_id')->references('id')->on('statments')->onDelete('cascade');
            $table->bigInteger('amount_in_dirham')->default(0);
            $table->bigInteger('amount_in_rs')->default(0);
            $table->bigInteger('rate')->default(0);
            $table->bigInteger('amount');
            $table->string('date');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
