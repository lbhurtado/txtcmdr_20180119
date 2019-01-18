<?php

namespace App\App\Actions;

use App\Missive\Domain\Models\Airtime;

abstract class ActionAbstract
{
	abstract public function key();

	public function getModel()
	{
		return Airtime::where('key', $this->key())->first();
	}
}