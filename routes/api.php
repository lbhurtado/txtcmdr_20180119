<?php

Route::post('/webhook/sms', App\Missive\Actions\CreateSMSAction::class);
Route::get('/webhook/sms', App\Missive\Actions\ListSMSAction::class);