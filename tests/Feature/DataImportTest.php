<?php

namespace Tests\Feature;

use App\Client\CoinLoreClient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataImportTest extends TestCase
{
    use RefreshDatabase;

    public function testCoinLoreDataImport()
    {
        $this->artisan('command:import:coinlore:data')->assertExitCode(0);

        $this->assertDatabaseCount('global_data', 1);
        $this->assertDatabaseCount('coin_data', 4);
        $this->assertDatabaseHas('coin_data', ['symbol' => CoinLoreClient::BTC_COIN_LORE_SYMBOL]);
        $this->assertDatabaseHas('coin_data', ['symbol' => CoinLoreClient::ETH_COIN_LORE_SYMBOL]);
        $this->assertDatabaseHas('coin_data', ['symbol' => CoinLoreClient::XRP_COIN_LORE_SYMBOL]);
        $this->assertDatabaseHas('coin_data', ['symbol' => CoinLoreClient::USDT_COIN_LORE_SYMBOL]);
    }
}
