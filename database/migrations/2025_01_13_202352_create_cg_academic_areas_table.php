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
        Schema::create('cg_academic_areas', function (Blueprint $table) {
            $table->id();
            $table->string('area_name', 150);
            $table->unsignedBigInteger('cg_dependency_id');
            $table->timestamps();

            $table->foreign('cg_dependency_id')->references('id')->on('cg_dependencies')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cg_academic_areas');
    }
};
