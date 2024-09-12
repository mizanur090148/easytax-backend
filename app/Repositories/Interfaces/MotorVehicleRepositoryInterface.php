<?php


namespace App\Repositories\Interfaces;

interface MotorVehicleRepositoryInterface extends BaseRepositoryInterface
{
	public function storeOrUpdate(array $data);
}