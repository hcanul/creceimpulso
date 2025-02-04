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
        Schema::create('database_connections', function (Blueprint $table) {
            $table->id();
            $table->string('office_name')->unique();
            $table->integer('city_id');
            $table->string('db_name',50);
            $table->string('db_user',50);
            $table->string('db_password',50);
            $table->string('db_host',50)->default('65.99.225.30');
            $table->integer('db_port')->default(3306);
            $table->string('db_host_local',50)->default('127.0.0.1');
            $table->string('db_user_local',50)->default('root');
            $table->string('db_password_local',50)->default('root');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_connections');
    }
};
