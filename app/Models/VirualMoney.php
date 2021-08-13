<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirualMoney extends Model
{
    protected $table = 'virtual_money';

    protected $fillable = [
        'id',
        'name',
        'code',
        'buy',
        'sell',
        'image',
    ];
}
