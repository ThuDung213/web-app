<?php

namespace App\Repositories;

abstract class BaseRepositories implements RepositoriesInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    abstract public function getModel();

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $object = $this->model->find($id);

        return $object->update($data);
    }

    public function delete($id)
    {
        $object = $this->model->find($id);

        return $object->delete();
    }

    public function searchAndPaginate($searchBy, $keyword, $perPage = 5)
    {
        return $this->model
            ->where($searchBy, 'like', '%' . $keyword . '%')
            ->orderBy('id', 'desc')
            ->paginate($perPage)
            ->appends(['search' => $keyword]);
    }

    public function getAllAndPaginate($perPage = 5)
    {
        return $this->model->all()->toQuery()->paginate($perPage);
    }
}
