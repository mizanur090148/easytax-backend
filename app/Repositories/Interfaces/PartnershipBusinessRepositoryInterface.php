<?php


namespace App\Repositories\Interfaces;

interface PartnershipBusinessRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
