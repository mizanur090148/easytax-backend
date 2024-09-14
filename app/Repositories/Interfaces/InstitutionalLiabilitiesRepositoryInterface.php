<?php


namespace App\Repositories\Interfaces;

interface InstitutionalLiabilitiesRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
