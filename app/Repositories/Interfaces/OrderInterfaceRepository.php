<?php

namespace App\Repositories\Interfaces;

interface OrderInterfaceRepository
{
    public function store($request);
    public function update($id,$request);
}