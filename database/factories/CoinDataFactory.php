<?php

namespace Database\Factories;

use App\Models\CoinData;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoinDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CoinData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'symbol'    => strtoupper(substr($this->faker->word, 0, 3)),
            'name'      => $this->faker->company,
            'price_usd' => $this->faker->randomFloat(4, 0, 50000),
            'raw_data'  => json_encode(['bla' => 'bla']),
        ];
    }
}
