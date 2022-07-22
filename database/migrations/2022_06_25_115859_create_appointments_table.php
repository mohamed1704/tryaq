<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->date('date');
            $table->foreignId('department_id')->nullable()->on('departments')->cascadeOnDelete();
            $table->foreignId('patient_id')->nullable()->on('patient')->cascadeOnDelete();
            $table->string('service_name');
            $table->enum('status', ['active', 'draft']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency');
    }
};
