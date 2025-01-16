<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->bigIncrements('computer_id');
            $table->string('password', 25);
            $table->unsignedBigInteger('order_device_id');
            $table->timestamps();

            $table->foreign('order_device_id')->references('order_device_id')->on('order_devices')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
