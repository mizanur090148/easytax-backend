<?php


namespace App\Repositories\Interfaces;

interface FinancialAssetRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}