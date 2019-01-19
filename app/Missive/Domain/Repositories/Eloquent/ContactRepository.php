<?php

namespace App\Missive\Domain\Repositories\Eloquent;

use App\Missive\Domain\Models\Contact;

class ContactRepository
{
	public function updateOrCreate($data, $name = null)
	{
		return Contact::updateOrCreate(
			array_only($data, 'mobile'), 
			array_merge($data, [
				'name' => $name
			])
		);
	}

	public function withMobile($mobile)
	{
		return Contact::whereMobile($mobile)->firstOrFail();
	}
}