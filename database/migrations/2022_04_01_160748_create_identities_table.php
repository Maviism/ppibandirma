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
        Schema::create('identities', function (Blueprint $table) {
            $table->id();
            // $table->string('tanggal_lahir');
            $table->enum('gender', ['laki', 'perempuan']);
            // $table->enum('married', ['sudah', 'belum']);
            $table->string('fakultas_prodi');
            // $table->string('tahun_kedatangan');
            // $table->string('tahun_kelulusan');
            // $table->string('Agama');
            // $table->string('kartu_pelajar');
            // $table->string('pas_foto');
            $table->string('phone_number');
            // $table->string('student_no');
            $table->string('passport_no');
            // $table->string('ikamet_no');
            // $table->string('address_tr');
            // $table->string('address_id');
            // $table->string('father_name');
            // $table->string('mother_name');
            // $table->string('parent_phone_number');
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
        Schema::dropIfExists('identities');
    }
};
