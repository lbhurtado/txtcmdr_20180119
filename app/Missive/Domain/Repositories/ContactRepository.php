<?php

namespace App\Missive\Domain\Repositories;

use App\Missive\Domain\Models\Contact;

class ContactRepository
{
	public function create($data, $name = null)
	{
		return Contact::updateOrCreate(
			array_only($data, 'mobile'), 
			array_merge($data, [
				'name' => $name
			])
		);
	}
}