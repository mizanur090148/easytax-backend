<?php


namespace App\Repositories\Interfaces;

interface FurnitureEquipmentRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}