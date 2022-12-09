<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('item_id')->unsigned()->index();
            $table->string('name', 100)->index();
            $table->smallInteger('type')->nullable();
            $table->string('amount',100)->default(0);#売上数
            $table->string('price',100)->default(0);#単価
            $table->string('total_price',100)->default(0);#合計金額
            // $table->string('detail', 500)->nullable();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
