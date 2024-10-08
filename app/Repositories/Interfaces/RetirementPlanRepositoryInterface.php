<?php


namespace App\Repositories\Interfaces;

interface RetirementPlanRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
