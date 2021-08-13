<?php

namespace App\Repositories\VirualMoney;

use App\Models\VirualMoney;
use App\Repositories\Eloquent\EloquentRepository;

class VirualMoneyEloquentRepository extends EloquentRepository implements VirualMoneyRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return VirualMoney::class;
    }
}
