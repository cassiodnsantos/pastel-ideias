<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Pastry;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\PastryInterfaceRepository;

class PastryEloquentRepository extends BaseEloquentRepository implements PastryInterfaceRepository
{
    public function entity()
    {
        return Pastry::class;
    }
}
