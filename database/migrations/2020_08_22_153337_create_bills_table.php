<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_code');
            $table->string('bill_name');
            $table->string('bill_phone');
            $table->string('ship_name')->nullable();
            $table->string('ship_phone')->nullable();
            $table->string('address');
            $table->string('email');
            $table->text('notes');
            $table->dateTime('ship_date');
            $table->dateTime('receive_date');
            $table->text('cause')->nullable();
            $table->boolean('confirm')->default(false);
            //Foreign Key
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_cancel')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('bills');
    }
}
