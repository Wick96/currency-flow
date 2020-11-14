<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_data', function (Blueprint $table) {
            $table->id();
            $table->integer('coins_count')->nullable()->default(null);
            $table->integer('active_markets')->nullable()->default(null);
            $table->decimal('btc_d')->nullable()->default(null);
            $table->decimal('eth_d')->nullable()->default(null);
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
        Schema::dropIfExists('global_data');
    }
}
