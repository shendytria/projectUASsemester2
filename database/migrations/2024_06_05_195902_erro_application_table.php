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
        Schema::create('error_application', function(Blueprint $table){
            $table->id();
            $table->string('id_user', 30)->nullable();
            $table->string('error_date');
            $table->string('modules', 100)->nullable();
            $table->string('controller', 200);
            $table->string('function', 200);
            $table->string('error_line', 30);
            $table->string('error_message', 1000);
            $table->string('status', 30);
            $table->string('param', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('error_application');
    }
};
