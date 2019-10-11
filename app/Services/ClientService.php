<?php

namespace App\Services;
use App\Services\BaseService;
use App\Repositories\Interfaces\ClientInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
class ClientService extends BaseService
{
    protected $repository;

    public function __construct( ClientInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($request){

        $qtd = $request['per_page'];
        $page = $request['page'];
        $registro = $this->repository->relationships(['orders'])->paginate($qtd);

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
        $registro = $registro->appends(Request::capture()->except('page'));
        return response()->json($registro);
    }
    public function show($id)
    {
        if(!$this->repository->findById($id))
        {
            return response()->json(['error'=>'data_not_found'],400);
        }
        return $this->repository->relationships(['orders.itens'])->findById($id);
    }
}
