<?php
namespace App\Repositories\Core;
use App\Repositories\Exeptions\NoEntityDefined;
use App\Repositories\Interfaces\InterfaceRepository;

class BaseEloquentRepository implements InterfaceRepository
{
    protected $entity; // objeto referência a camada de Model
    public function __construct() {
        $this->entity = $this->resolveEntity();
    }
    public function getAll()
    {
        return $this->entity->get();
    }
    public function findById($id)
    {
        return $this->entity->find($id);
    }
    public function findWhere($column,$valor)
    {
        return $this->entity->where($column,$valor)->get();
    }
    public function findWhereFirst($column,$valor)
    {
        return $this->entity->where($column,$valor)->first();
    }
    public function pluck($field,$valor)
    {
        return $this->entity->pluck($field,$valor);
    }
    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }
    public function store(array $data)
    {
        $registro = $this->entity->create($data);
        return $registro;
    }
    public function update($id,array $data)
    {
        $registro = $this->findById( $id )->update( $data );
        return $registro;
    }
    public function delete($id)
    {
        $registro = $this->entity->find($id)->delete();
        return $registro ;

    }
    public function orderBy($column,$order = 'DESC')
    {
        $this->entity = $this->entity->orderBy($column,$order);
        return $this;
    }
    public function relationships(array $relationships)
    {
        $this->entity = $this->entity->with($relationships);
        return $this;
    }

    public function softDelete()
    {
        $this->entity = $this->entity->withTrashed();
        return $this;
    }

    public function resolveEntity()
    {
        if(!method_exists($this, 'entity')){
            throw new NoEntityDefined;
        }
        return app($this->entity());
    }
}
