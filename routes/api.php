<?php

Route::post('/webhook/sms', App\Missive\Actions\CreateSMSAction::class);
