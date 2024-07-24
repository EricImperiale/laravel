<?php

namespace App\Repositories;

use App\Models\Propietario;
use App\Repositories\Interfaces\PropietarioRepository;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class PropietariosEloquentRepository implements PropietarioRepository
{
    private Propietario $propietario;
    private Builder $builder;

    public function __construct()
    {
        $this->propietario = new Propietario;
        $this->builder = $this->propietario->query();
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
        return Propietario::findOrFail($id);
    }

    public function create(array $data)
    {
        DB::transaction(function() use ($data) {
            $movie = Propietario::create($data);
            $movie->genres()->attach($data['genre_id'] ?? []);
        });
    }

    public function update(int $id, array $data)
    {
        return Propietario::findOrFail($id)->update($data);
    }

    public function delete(int $id)
    {
        return Propietario::findOrFail($id)->delete();
    }
}
