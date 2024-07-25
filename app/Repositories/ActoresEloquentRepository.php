<?php

namespace App\Repositories;

use App\Models\Propietario;
use App\Repositories\Interfaces\ActoresRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ActoresEloquentRepository implements ActoresRepository
{
    private Builder $builder;
    private $modelClass;

    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
        $this->builder = (new $modelClass)->newQuery();
    }

    public function all()
    {
        return Propietario::all();
    }

    public function get()
    {
        return $this->builder->get();
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->builder->paginate($perPage, $columns, $pageName, $page);
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and'): self
    {
        $this->builder->where($column, $operator, $value, $boolean);
        return $this;
    }

    public function withRelations(array $relations): self
    {
        $this->builder->with($relations);
        return $this;
    }

    public function findOrFail(int $id)
    {
        return $this->modelClass::findOrFail($id);
    }

    public function create(array $data)
    {
        return DB::transaction(function() use ($data) {
            $model = new $this->modelClass;
            return $model->create($data);
        });
    }

    public function update(int $id, array $data)
    {
        $modelInstance = $this->modelClass::findOrFail($id);
        $modelInstance->update($data);
        return $modelInstance;
    }

    public function delete(int $id)
    {
        return $this->modelClass::findOrFail($id)->delete();
    }
}
