<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkks', function (Blueprint $table) {
            $table->integer('bkk_id')->autoIncrement();
            $table->string('bkk_nama');
            $table->string('bkk_alamat');
            $table->string('bkk_telepon');
            $table->string('bkk_daerah');
            $table->integer('pencaker')->default(0);
            $table->tinyInteger('is_actived');
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
        Schema::dropIfExists('bkks');
    }
}
