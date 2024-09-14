<?php


namespace App\Repositories\Interfaces;

interface JewelleryRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}