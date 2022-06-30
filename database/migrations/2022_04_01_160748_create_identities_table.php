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
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nip')->unique()->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('date_of_birth');
            $table->enum('gender', ['l', 'p']);
            $table->string('phone_number')->nullable();
            $table->enum('married', ['sudah', 'belum']);
            $table->string('educational_type')->nullable();//Master, sarjana
            $table->string('university')->nullable();
            $table->string('faculty')->nullable();
            $table->string('departman')->nullable();
            $table->string('arrival_year')->nullable();
            $table->string('graduate_year')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('address_tr')->nullable();
            $table->string('provincial_origin')->nullable();//asal provinsi
            $table->string('parent_phone_number')->nullable();
            $table->string('student_no')->nullable()->unique();
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

