<?php


namespace App\Repositories\Interfaces;

interface TaxPaidRefundRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
