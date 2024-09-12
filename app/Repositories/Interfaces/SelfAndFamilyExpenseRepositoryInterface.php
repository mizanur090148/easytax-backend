<?php


namespace App\Repositories\Interfaces;

interface SelfAndFamilyExpenseRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}