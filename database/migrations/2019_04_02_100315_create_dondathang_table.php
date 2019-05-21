<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDondathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dondathang', function (Blueprint $table) {
            $table->bigIncrements('MaDDH');
            $table->unsignedBigInteger('MaND');
            $table->foreign('MaND')
                ->references('MaND')->on('nguoidung')
                ->onDelete('cascade');
            $table->integer('TrangThai');
            $table->string('DiaChiNN');
            $table->string('SDTNN');
            $table->string('TenNN');
            $table->dateTime('NgayDat');
            $table->dateTime('NgayGiao');
            $table->double('TongTien');
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
        Schema::dropIfExists('dondathang');
    }
}
