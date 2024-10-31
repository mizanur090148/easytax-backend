<?php


namespace App\Repositories\Interfaces;

interface DirectoryShareRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}