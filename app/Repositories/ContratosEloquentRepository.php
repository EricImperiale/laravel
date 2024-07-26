<?php

namespace App\Repositories;

use App\Models\Contrato;
use App\Repositories\Interfaces\ContratosRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ContratosEloquentRepository implements ContratosRepository
{
    public Builder $builder;
    public Contrato $contrato;

    public function __construct()
    {
        $this->contrato = new Contrato;
        $this->builder = $this->contrato->query();
    }

    public function all()
    {
        return Contrato::all();
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
        return Contrato::findOrFail($id);
    }

    public function findOrFailWithRelations(int $id, array $relations)
    {
        return $this->contrato::with($relations)->findOrFail($id);
    }

    public function create(array $data)
    {
        DB::transaction(function() use ($data) {
            Contrato::create($data);
        });
    }

    public function update(int $id, array $data)
    {
        return Contrato::findOrFail($id)->update($data);
    }

    public function delete(int $id)
    {
        return Contrato::findOrFail($id)->delete();
    }
}
