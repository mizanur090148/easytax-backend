<?php


namespace App\Repositories\Interfaces;

interface OtherInvestmentRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
