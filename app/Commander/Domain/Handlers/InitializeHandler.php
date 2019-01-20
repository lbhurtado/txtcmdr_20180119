<?php

namespace App\Commander\Domain\Handlers;

use App\Commander\Domain\Commands\InitializeCommand;
use League\Tactician\Exception;

class InitializeHandler
{
    public function __construct()
    {

    }

    public function handle(InitializeCommand $command)
    {
        \Log::info("InitializeHandler::handle");
    }
}
