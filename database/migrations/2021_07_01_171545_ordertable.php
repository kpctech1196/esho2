<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ordertable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertable', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('orderid');
            $table->string('productname');
            $table->string('pay_method');
            $table->string('totalamt');
            $table->string('status');
            $table->string('orderdate');
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
        //
    }
}
