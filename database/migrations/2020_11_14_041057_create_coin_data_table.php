<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_data', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->decimal('price_usd', 14,8)->nullable()->default(null);
            $table->json('raw_data');
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
        Schema::dropIfExists('coin_data');
    }
}
