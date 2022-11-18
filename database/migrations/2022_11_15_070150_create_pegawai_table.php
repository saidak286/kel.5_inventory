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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nip', 3)->unique();
            $table->string('name', 45);
            $table->unsignedBigInteger('jabatan_id');
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('tmp_lahir', 45);
            $table->string('tgl_lahir', 45);
            $table->text('alamat');
            $table->bigInteger('telepon');
            $table->text('foto');
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
        Schema::dropIfExists('pegawai');
    }
};
