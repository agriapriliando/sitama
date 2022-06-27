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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('program_id')->constrained('programs');
            $table->foreignId('scholarship_id')->constrained('scholarships');
            $table->foreignId('stat_id')->constrained('stats');
            $table->string('foto')->nullable();
            $table->string('tahun_beasiswa',10)->nullable();
            $table->string('nim',20);
            $table->string('nama_rekening')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('bank')->nullable();
            $table->string('no_rekening')->nullable();
            $table->decimal('ip_one',3,2)->nullable();
            $table->decimal('ip_two',3,2)->nullable();
            $table->decimal('ip_three',3,2)->nullable();
            $table->decimal('ip_four',3,2)->nullable();
            $table->decimal('ip_five',3,2)->nullable();
            $table->decimal('ip_six',3,2)->nullable();
            $table->decimal('ip_seven',3,2)->nullable();
            $table->decimal('ip_eight',3,2)->nullable();
            $table->decimal('ipk',3,2)->nullable();
            $table->text('note')->nullable();
            $table->string('berkas_one')->nullable();
            $table->string('berkas_two')->nullable();
            $table->string('berkas_three')->nullable();
            $table->string('berkas_four')->nullable();
            $table->string('berkas_five')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
