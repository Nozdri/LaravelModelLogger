<?php


namespace Models\Product;


use Illuminate\Database\Eloquent\Model;
use Events\PriceUpdated;

class Price extends Model
{
	//some code...

	protected $dispatchesEvents = [
		'updating' => PriceUpdated::class,
	];
}