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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('whatsapp')->nullable();
            $table->string('dp')->nullable();
            $table->string('cnic');
            $table->date('cnic_expiry');
            $table->string('cnic_front');
            $table->string('cnic_back');
            $table->string('passport');
            $table->date('passport_expiry');
            $table->string('passport_photo');
            $table->enum('passport_hand', ['Client', 'Company'])->default('Client');
            $table->string('license_no');
            $table->date('license_expiry');
            $table->string('license_photo');
            $table->string('vehicle_number')->nullable();
            $table->string('vehicle_letter')->nullable();
            $table->enum('agreement_type', ['Yearly', 'Monthly'])->default('Yearly');
            $table->date('agreement_from');
            $table->date('agreement_to');
            $table->longText('address');
            $table->date('start_date');
            $table->date('ending_date')->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->integer('status')->default(1);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
};
