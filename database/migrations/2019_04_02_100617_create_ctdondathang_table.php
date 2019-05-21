<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtdondathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctdondathang', function (Blueprint $table) {
            $table->bigIncrements('MaCTDDH');
            $table->unsignedBigInteger('MaDDH');
            $table->foreign('MaDDH')
                ->references('MaDDH')->on('dondathang')
                ->onDelete('cascade');
            $table->unsignedBigInteger('MaSP');
            $table->foreign('MaSP')
                ->references('MaSP')->on('sanpham')
                ->onDelete('cascade');
            $table->integer('SoLuong');
            $table->double('DonGia');
            $table->double('ThanhTien');
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
        Schema::dropIfExists('ctdondathang');
    }
}
