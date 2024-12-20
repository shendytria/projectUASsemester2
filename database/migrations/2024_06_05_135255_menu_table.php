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
        Schema::create('menu', function(Blueprint $table){
            $table->increments('menu_id', 3);
            $table->string('id_level', 3);
            $table->string('menu_name', 300);
            $table->string('menu_link', 300);
            $table->string('menu_icon', 300);
            $table->string('parent_id', 30);
            $table->string('create_by', 30);
            $table->date('create_date');
            $table->string('delete_mark', 1);
            $table->string('update_by', 30);
            $table->date('parent-date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('menu');
    }
};
