<?php

namespace Listeners;


use Events\Content\Event;
use Illuminate\Database\Eloquent\Model;
use Log;

abstract class ModelChangesLogger
{
	protected const LOGES_ATTRIBUTES = [];

	/**
	 * @param $event
	 */
	public function handle(Event $event): void
	{
		$this->logModelChanges($event->model);
	}

	/**
	 * @param Model $model
	 */
	private function logModelChanges(Model $model): void
	{
		$primaryKey = $model->getKeyName();

		$result = [
			$primaryKey => $model[$primaryKey],
			'user' => \Auth::user()->ID,
		];

		foreach ($model->getAttributes() as $attribute => $value) {

			if ($model->isDirty($attribute) && in_array($attribute, static::LOGES_ATTRIBUTES, true)) {

				$result[$attribute] = [
					'old' => $model->getOriginal($attribute),
					'new' => $model[$attribute],
				];
			}
		}

		if (count($result) > 2) {

			Log::channel('products.changes')->info(json_encode($result));
		}
	}
}