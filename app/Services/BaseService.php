<?php

namespace App\Services;
use Illuminate\Http\Request;

class BaseService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }


    public function index($request)
    {
        $registro = $this->repository->getAll();
        return response()->json($registro);
    }

    public function store($request)
    {
        if(!$store = $this->repository->store($request->all())){
            return response()->json(['error'=>'error_store_data'],500);
        }
        return response()->json(['result'=>'success_store']);
    }

    public function show($id)
    {
        if(!$this->repository->findById($id))
        {
            return response()->json(['error'=>'data_not_found'],400);
        }
        return $this->repository->findById($id);
    }

    public function update($request,$id)
    {
        if(!$this->repository->findById($id))
        {
            return response()->json(['error'=>'data_not_found'],400);
        }

        if(!$update = $this->repository->update($id,$request->all())){
            return response()->json(['error'=>'error_update_data'],500);
        }
        return response()->json(['result'=>'success_update']);
    }

    public function delete($id)
    {
        if(!$this->repository->findById($id))
        {
            return response()->json(['error'=>'register_not_found'],400);
        }
        if(!$delete = $this->repository->delete($id)){
            return response()->json(['error'=>'error_delete_data'],500);
        }
        return response()->json(['result'=>'success_delete']);
    }
}
