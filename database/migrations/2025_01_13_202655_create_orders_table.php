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
            $table->string('order_number', 15)->primary(); // Llave primaria generada por el trigger
            $table->dateTime('date_generation');
            $table->dateTime('date_reception')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->string('status', 20);
            $table->string('client_deliveries', 50);
            $table->string('client_receives', 50)->nullable();
            $table->string('phone_number', 10)->nullable();
            $table->string('ext', 15)->nullable();
            $table->string('cell_number', 10)->nullable();
            $table->string('mail', 50)->nullable();
            $table->unsignedBigInteger('kperson_delivery');
            $table->unsignedBigInteger('cg_dependency_id');
            $table->unsignedBigInteger('ceca_receives')->nullable();
            $table->unsignedBigInteger('ceca_deliveries')->nullable();
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

            $table->foreign('ceca_receives')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('ceca_deliveries')
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
                DECLARE last_id INT DEFAULT 0;

                SELECT COALESCE(MAX(CAST(SUBSTRING_INDEX(order_number, "-", -1) AS UNSIGNED)), 0)
                INTO last_id
                FROM orders;

                SET NEW.order_number = CONCAT("AM-", last_id + 1);
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
