<?php

namespace Listeners;


class LogWarehouseUpdating extends ModelChangesLogger
{
	protected const LOGES_ATTRIBUTES = [
		'QUANTITY',
		'PURCHASING_PRICE',
	];
}