<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->text('notes')->nullable()->change();
            $table->dateTime('ship_date')->nullable()->change();
            $table->dateTime('receive_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->text('notes')->change();
            $table->dateTime('ship_date')->change();
            $table->dateTime('receive_date')->change();
        });
    }
}
