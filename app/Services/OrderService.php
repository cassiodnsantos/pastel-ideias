<?php

namespace App\Services;
use App\Services\BaseService;
use App\Repositories\Interfaces\OrderInterfaceRepository;
use App\Repositories\Interfaces\ClientInterfaceRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
class OrderService extends BaseService
{
    protected $repository;
    protected $client;
    public function __construct( OrderInterfaceRepository $repository, ClientInterfaceRepository $client)
    {
        $this->repository = $repository;
        $this->client = $client;
    }
    public function index($request){

        $qtd = $request['per_page'];
        $page = $request['page'];
        $registro = $this->repository->relationships(['itens'])->paginate($qtd);

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
        return $this->repository->relationships(['itens','client'])->findById($id);
    }
    public function store($request){

        if(!$this->client->findById($request->input('client_id'))){
            return response()->json(['error'=>'client_not_found'],400);
        }
        if(!$store = $this->repository->store($request->all())){
            return response()->json(['error'=>'error_store_data'],500);
        }
        return response()->json(['result'=>'success_store']);
    }

}
