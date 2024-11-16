<?php


namespace App\Repositories\Interfaces;

interface AssetOutsideBDRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
