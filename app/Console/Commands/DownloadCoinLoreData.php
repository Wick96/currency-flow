<?php

namespace App\Console\Commands;

use App\Client\CoinLoreClient;
use App\Models\CoinData;
use App\Models\GlobalData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DownloadCoinLoreData extends Command
{
    /** @var string */
    protected $signature = 'command:download:coinlore:data';

    /** @var string */
    protected $description = 'This command fetch coinlore API and save data to our database!';

    /** @var CoinLoreClient */
    private $client;

    public function __construct(CoinLoreClient $client)
    {
        $this->client = $client;
        parent::__construct();
    }

    public function handle()
    {
        $this->downloadGlobalData();

        $this->downloadCoinData(CoinLoreClient::BTC_COIN_LORE_ID);
        $this->downloadCoinData(CoinLoreClient::ETH_COIN_LORE_ID);
        $this->downloadCoinData(CoinLoreClient::XRP_COIN_LORE_ID);
        $this->downloadCoinData(CoinLoreClient::USDT_COIN_LORE_ID);

        return 0;
    }

    private function downloadGlobalData(): void
    {
        $globalData = $this->client->getGlobalData();

        if (!empty($globalData[0])) {
            $validator = Validator::make($globalData[0], [
                'coins_count'    => 'required',
                'active_markets' => 'required',
                'btc_d'          => 'required',
                'eth_d'          => 'required',
            ]);

            try {
                $validatedData = $validator->validate();
            } catch (ValidationException $e) {
                Log::warning('coinlore_download_command: Cannot create new GlobalData entry! Validation Failed!', $e->getMessage());
                return;
            }

            $globalDataEntry = new GlobalData();

            $globalDataEntry->raw_data = json_encode($globalData[0]);
            $globalDataEntry->fill($validatedData);

            $globalDataEntry->save();
        } else {
            Log::warning('coinlore_download_command: Cannot create new GlobalData entry! Missing data!');
        }
    }

    private function downloadCoinData($coinId): void
    {
        $coinData = $this->client->getCoinData($coinId);

        if (!empty($coinData[0])) {
            $validator = Validator::make($coinData[0], [
                'symbol'    => 'required',
                'name'      => 'required',
                'price_usd' => 'required',
            ]);

            try {
                $validatedData = $validator->validate();
            } catch (ValidationException $e) {
                Log::warning('coinlore_download_command: Cannot create new CoinData entry! Validation Failed!', $e->getMessage());
                return;
            }

            $coinDataEntry = new CoinData();

            $coinDataEntry->raw_data = json_encode($coinData[0]);
            $coinDataEntry->fill($validatedData);

            $coinDataEntry->save();
        } else {
            Log::warning('coinlore_download_command: Cannot create new CoinData entry! Missing data!');
        }
    }
}
