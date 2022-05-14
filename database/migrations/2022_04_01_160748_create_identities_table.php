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
            $table->foreignId('user_id');
            $table->enum('gender', ['laki', 'perempuan']);
            $table->enum('married', ['sudah', 'belum']);
            $table->string('religion')->nullable();
            $table->string('arrival_year')->nullable();
            $table->string('student_no')->unique();
            $table->string('university');
            $table->string('faculty')->nullable();
            $table->string('departman')->nullable();
            $table->string('date_of_birth');
            $table->string('blood_type')->nullable();
            $table->string('phone_number');
            $table->string('parent_phone_number')->nullable();
            $table->string('address_tr')->nullable();
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
