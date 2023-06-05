<?php
namespace App\Repositories;

interface RepositoriesInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);

    public function searchAndPaginate($searchBy, $keyword, $perPage = 5);
    public function getAllAndPaginate($perPage = 5);
}
