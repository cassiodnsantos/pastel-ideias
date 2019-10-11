<?php
namespace App\Repositories\Core\Eloquent;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\ClientInterfaceRepository;
use App\Models\Client;

class ClientEloquentRepository extends BaseEloquentRepository implements ClientInterfaceRepository
{
    public function entity()
    {
        return Client::class;
    }
}