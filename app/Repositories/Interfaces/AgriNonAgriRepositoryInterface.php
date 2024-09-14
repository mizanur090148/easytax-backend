<?php


namespace App\Repositories\Interfaces;

interface AgriNonAgriRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}