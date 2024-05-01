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
        Schema::create('tbl_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('person_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->tinyInteger('priority')->default(2);
            $table->string('name');
            $table->text('description');
            $table->tinyInteger('status')->default(1); 
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('tbl_project')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('tbl_person')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_task');
    }
};
