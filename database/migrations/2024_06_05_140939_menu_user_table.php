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
        Schema::create('menu_user', function(Blueprint $table){
            $table->increments('no_seting', 3);
            $table->string('id-user', 30);
            $table->string('menu_id', 3);
            $table->string('create_date', 30);
            $table->timestamp('create_time')->nullable();;
            $table->string('delete_mark', 1);
            $table->string('update_by', 30);
            $table->timestamp('parent-date')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('menu_user');
    }
};
