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
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acceptable');
            $table->text('review');
            $table->text('content');
            $table->text('file');
            $table->text('special_needs');
            $table->integer('college_id')->unsigned();
            $table->foreign('college_id')
            ->references('id')->on('colleges')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
            ->references('id')->on('students')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
