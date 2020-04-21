<?php


namespace Models\Product;


use Illuminate\Database\Eloquent\Model;
use Events\WarehouseUpdated;

class Warehouse extends Model
{
	//some code...

	protected $dispatchesEvents = [
		'updated' => WarehouseUpdated::class,
	];
}