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
        Schema::create('u_community', function (Blueprint $table) {
            $table->integer('no_cuenta')->primary();
            $table->integer('nip');
            $table->string('nombres', 50);
            $table->string('ap_paterno', 25);
            $table->string('ap_materno', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('u_community');
    }
};
