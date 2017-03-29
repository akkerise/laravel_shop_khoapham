<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNganLuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngan_luongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('order_code');
            $table->string('payment_type');
            $table->integer('price');
            $table->text('information');
            $table->tinyInteger('transaction_status');
            $table->integer('voucher_percent');
            $table->integer('voucher_money');
            $table->integer('customer_id');
            //                Ngân Lượng field
            $table->text('transaction_info');
            $table->integer('payment_id');
            $table->text('error_text');
            $table->string('secure_code');
//            $table->integer('customer_id')->unsigned();
//            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('ngan_luongs');
    }
}
