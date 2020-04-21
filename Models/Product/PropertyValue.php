<?php


namespace Models\Product;


use Illuminate\Database\Eloquent\Model;
use Events\PropertyValueUpdated;

class PropertyValue extends Model
{
	//some code...

	protected $dispatchesEvents = [
		'updated' => PropertyValueUpdated::class,
	];
}
