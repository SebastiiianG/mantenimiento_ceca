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
        Schema::create('order_devices', function (Blueprint $table) {
            $table->bigIncrements('order_device_id');
            $table->string('model', 30);
            $table->text('client_observations')->max(500);
            $table->text('diagnostic')->max(500);
            $table->text('ceca_observations')->max(500);
            $table->string('status', 15);
            $table->boolean('computer')->nullable()->default(false);
            $table->string('serial_number', 50)->nullable();

            // Definir las claves foráneas e índices
            $table->unsignedBigInteger('cg_brand_id');
            $table->string('order_number', 15);
            $table->unsignedBigInteger('cg_kind_failure_id');
            $table->unsignedBigInteger('cg_kind_object_id');
            $table->unsignedBigInteger('ceca_repairs');

            $table->timestamps();

            // Claves foráneas
            $table->foreign('cg_brand_id')
                  ->references('cg_brand_id')
                  ->on('cg_brands')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('order_number')
                  ->references('order_number')
                  ->on('orders')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('cg_kind_object_id')
                  ->references('cg_kind_object_id')
                  ->on('cg_kind_objects')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('cg_kind_failure_id')
                  ->references('cg_kind_failure_id')
                  ->on('cg_kind_failures')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');

            $table->foreign('ceca_repairs')
                  ->references('user_id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_devices');
    }
};
