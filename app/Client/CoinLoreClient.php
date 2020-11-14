<?php


namespace App\Client;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CoinLoreClient
{
    const COIN_LORE_API_URL = 'https://api.coinlore.net/api/';

    const BTC_COIN_LORE_ID = 90;
    const ETH_COIN_LORE_ID = 80;
    const XRP_COIN_LORE_ID = 58;
    const USDT_COIN_LORE_ID = 518;

    public function getGlobalData(): ?array
    {
        try {
            $response = $this->get('global');
        } catch (RequestException $e) {
            Log::error('coinlore_client: Can not get data from [/global] endpoint.', $e->getMessage());

            return null;
        }

        return $response->json();
    }

    public function getCoinData(int $coinId): ?array
    {
        try {
            $response = $this->get('ticker', ['id' => $coinId]);
        } catch (RequestException $e) {
            Log::error('coinlore_client: Can not get data from [/ticker] endpoint, for coin with id [' . $coinId . '].', $e->getMessage());

            return null;
        }

        return $response->json();
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    private function get(string $endpoint, array $params = []): Response
    {
        $response = Http::retry(3, 200)->get(self::COIN_LORE_API_URL . $endpoint, $params);

        $response->throw();

        return $response;
    }
}
