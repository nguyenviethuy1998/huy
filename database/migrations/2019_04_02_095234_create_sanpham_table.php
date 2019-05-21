<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('MaSP');
            $table->unsignedBigInteger('MaLoai');
            $table->foreign('MaLoai')
                ->references('MaLoai')->on('loaisanpham')
                ->onDelete('cascade');
            $table->unsignedBigInteger('MaNCC');
            $table->foreign('MaNCC')
                ->references('MaNCC')->on('nhacungcap')
                ->onDelete('cascade');
            $table->string('TenSP');
            $table->double('Gia');
            $table->double('GiaKM');
            $table->string('GhiChu');
            $table->integer('SoLuongCon');
            $table->string('KichThuoc');
            $table->string('Anh')->nullable();
            $table->text('MoTa');
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
        Schema::dropIfExists('sanpham');
    }
}
