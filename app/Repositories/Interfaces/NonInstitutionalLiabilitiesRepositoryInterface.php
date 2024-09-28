<?php


namespace App\Repositories\Interfaces;

interface NonInstitutionalLiabilitiesRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
