<?php


namespace App\Repositories\Interfaces;

interface BusinessAssetRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}