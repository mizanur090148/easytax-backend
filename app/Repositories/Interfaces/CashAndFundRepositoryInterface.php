<?php


namespace App\Repositories\Interfaces;

interface CashAndFundRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}