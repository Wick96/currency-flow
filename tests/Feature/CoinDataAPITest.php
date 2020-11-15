<?php

namespace Tests\Feature;

use App\Models\CoinData;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CoinDataAPITest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllCoinsDataUnauthorised()
    {
        $response = $this->get('/api/coins-data');

        $response->assertStatus(302);
    }

    public function testGetAllCoinsData()
    {
        $user = User::factory()->create();

        $user = CoinData::factory(8)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer secret-token-1',
        ])->get('/api/coins-data');

        $response->assertStatus(200);
        $response->assertJsonCount(8, 'data');
    }

    public function testGetAllCoinsDataPagination()
    {
        $user = User::factory()->create();

        $user = CoinData::factory(40)->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer secret-token-1',
        ])->get('/api/coins-data');

        $response->assertStatus(200);
        $response->assertJsonCount(15, 'data');
    }
}
