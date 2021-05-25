<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencakers', function (Blueprint $table) {
            $table->integer('pencaker_id')->autoIncrement();
            $table->integer('user_id');
            $table->string('nama');
            $table->string('daerah');
            $table->integer('bkk_id');
            $table->string('nik');
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('jk', 10);
            $table->string('agama', 10);
            $table->string('status_nikah');
            $table->string('pekerjaan');
            $table->integer('tinggi_badan');
            $table->string('telepon');
            $table->string('sekolah');
            $table->string('jurusan');
            $table->string('pelatihan')->nullable();
            $table->string('photo')->default('user.png');
            $table->tinyInteger('is_actived');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bkk_id')->references('bkk_id')->on('bkks')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencakers');
    }
}
