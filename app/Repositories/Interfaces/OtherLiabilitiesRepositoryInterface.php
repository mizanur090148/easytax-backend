<?php


namespace App\Repositories\Interfaces;

interface OtherLiabilitiesRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}
