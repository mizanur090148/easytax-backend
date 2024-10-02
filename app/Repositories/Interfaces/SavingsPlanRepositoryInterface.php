<?php


namespace App\Repositories\Interfaces;

interface SavingsPlanRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
