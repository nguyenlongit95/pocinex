<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradingVND extends Model
{
    protected $table = 'trading_vnd';

    protected $fillable = [
        'id',
        'date',
        'exchange_rate',
        'coin_id',
    ];
}
