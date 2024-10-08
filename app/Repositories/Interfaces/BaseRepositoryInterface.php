<?php


namespace App\Repositories\Interfaces;


interface BaseRepositoryInterface
{
    public function all($where = [], $orderBy = 'created_at', $order = 'asc');
    public function paginate($perPage = 15, $orderBy = 'created_at', $order = 'asc');
    public function find($id);
    public function store(array $data);
    public function storeAll(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getModel();
}