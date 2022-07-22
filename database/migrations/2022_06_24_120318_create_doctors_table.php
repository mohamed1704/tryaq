<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->string('speciallization');
            $table->string('phone');
            $table->string('image')->nullable();
            $table->string('password');

            $table->enum('gender', ['male', 'female']);
            $table->string('email')->unique()->nullable();
            $table->integer('room_num');
            $table->string('type_of_contract');
            $table->foreignId('department_id')->nullable()->constrained('departments')->cascadeOnDelete();
            $table->enum('status', ['on', 'off']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
