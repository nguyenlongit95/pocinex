<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradingUSD extends Model
{
    protected $table = 'trading_usd';

    protected $fillable = [
        'id',
        'date',
        'exchange_rate',
        'coin_id',
    ];
}
