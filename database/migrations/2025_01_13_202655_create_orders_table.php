<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 15);
            $table->date('date_generation');
            $table->date('date_reception')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('status', 20);
            $table->string('client_delivered', 50);
            $table->string('client_received', 50)->nullable();
            $table->string('phone_number', 10)->nullable();
            $table->string('ext', 15)->nullable();
            $table->string('cell_number', 10)->nullable();
            $table->string('mail', 50)->nullable();
            $table->unsignedBigInteger('kperson_delivery');
            $table->unsignedBigInteger('cg_dependency_id');
            $table->unsignedBigInteger('cg_academic_area_id')->nullable();
            $table->unsignedBigInteger('ceca_received')->nullable();
            $table->unsignedBigInteger('ceca_delivered')->nullable();
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('kperson_delivery')
                  ->references('id')
                  ->on('cg_kind_people')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('cg_dependency_id')
                  ->references('id')
                  ->on('cg_dependencies')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('cg_academic_area_id')
                  ->references('id')
                  ->on('cg_academic_areas')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('ceca_received')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('ceca_delivered')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });

        // Crear el trigger en la base de datos
        DB::unprepared('
            CREATE TRIGGER generate_order_number
            BEFORE INSERT ON orders
            FOR EACH ROW
            BEGIN
                DECLARE last_order_number INT DEFAULT 0;

                SELECT COALESCE(MAX(CAST(SUBSTRING_INDEX(order_number, "-", -1) AS UNSIGNED)), 0)
                INTO last_order_number
                FROM orders;

                SET NEW.order_number = CONCAT("AM-", last_order_number + 1);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Eliminar el trigger antes de eliminar la tabla
        DB::unprepared('DROP TRIGGER IF EXISTS generate_order_number');
        Schema::dropIfExists('orders');
    }
};
