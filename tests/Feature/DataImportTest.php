<?php

namespace Tests\Feature;

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
        $this->assertDatabaseHas('coin_data', ['symbol' => 'BTC']);
        $this->assertDatabaseHas('coin_data', ['symbol' => 'ETH']);
        $this->assertDatabaseHas('coin_data', ['symbol' => 'XRP']);
        $this->assertDatabaseHas('coin_data', ['symbol' => 'USDT']);
    }
}
