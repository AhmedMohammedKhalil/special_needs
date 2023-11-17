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
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();
            $table->text('content');
            $table->text('review')->nullable();
            $table->dateTime('date');
            $table->integer('professor_id')->unsigned();
            $table->foreign('professor_id')
            ->references('id')
            ->on('professors')->onDelete("cascade")->onUpdate("cascade");
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
            ->references('id')
            ->on('students')->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
