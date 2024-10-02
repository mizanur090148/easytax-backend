<?php


namespace App\Repositories\Interfaces;

interface ListedSecuritiesRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
