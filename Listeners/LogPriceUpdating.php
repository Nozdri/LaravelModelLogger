<?php

namespace Listeners;


class LogPriceUpdating extends ModelChangesLogger
{
	protected const LOGES_ATTRIBUTES = [
		'PRICE',
	];
}