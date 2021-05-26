<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpk1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipk1s', function (Blueprint $table) {
            $table->integer('ipk1_id')->autoIncrement();
            $table->integer('ipk1_name_id');
            $table->integer('15-19l')->default(0);
            $table->integer('15-19p')->default(0);
            $table->integer('20-29l')->default(0);
            $table->integer('20-29p')->default(0);
            $table->integer('30-44l')->default(0);
            $table->integer('30-44p')->default(0);
            $table->integer('45-54l')->default(0);
            $table->integer('45-54p')->default(0);
            $table->integer('55l')->default(0);
            $table->integer('55p')->default(0);
            $table->integer('jmll')->default(0);
            $table->integer('jmlp')->default(0);
            $table->integer('jml')->default(0);
            $table->string('ipk1_month', 8);
            $table->integer('bkk_id');
            $table->timestamps();

            $table->foreign('ipk1_name_id')->references('ipk1_name_id')->on('ipk1_names')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('bkk_id')->references('bkk_id')->on('bkks')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipk1s');
    }
}
