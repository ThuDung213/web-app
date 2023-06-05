<?php

namespace App\Service;

//Service kết nối giữa Controller với Respository để làm việc với database
class BaseService implements ServiceInterface
{
    public $repository;

    public function all()
    {
        return $this->repository->all();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function searchAndPaginate($searchBy,$keyword ,$perPage  = 5)
    {
        return $this->repository->searchAndPaginate($searchBy,$keyword,$perPage);
    }

    public function getAllAndPaginate($perPage = 5)
    {
        return $this->repository->getAllAndPaginate($perPage);
    }
}
