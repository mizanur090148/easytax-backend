<?php


namespace App\Repositories\Interfaces;

interface GovSecuritiesRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
