<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CoinData
 *
 * @property int $id
 * @property string|null $symbol
 * @property string|null $name
 * @property string|null $price_usd
 * @property mixed $raw_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData wherePriceUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData whereRawData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoinData whereUpdatedAt($value)
 */
	class CoinData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GlobalData
 *
 * @property int $id
 * @property int|null $coins_count
 * @property int|null $active_markets
 * @property string|null $btc_d
 * @property string|null $eth_d
 * @property mixed $raw_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData query()
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereActiveMarkets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereBtcD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereCoinsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereEthD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereRawData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GlobalData whereUpdatedAt($value)
 */
	class GlobalData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $api_token
 * @property string|null $api_token_preview
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiTokenPreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

