<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Order;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Interfaces\OrderInterfaceRepository;

class OrderEloquentRepository extends BaseEloquentRepository implements OrderInterfaceRepository
{
    public function entity()
    {
        return Order::class;
    }

    public function store($request)
    {
        $register = $this->entity->create($request);
        $register->itens()->sync($request['pastry_id']);
        return $register;
    }

    public function update($id,$request)
    {
        $register = $this->entity->find( $id );
        $register->itens()->sync([]);
        $register->itens()->sync( $request['pastry_id'] );
        return $register;        
    }
}