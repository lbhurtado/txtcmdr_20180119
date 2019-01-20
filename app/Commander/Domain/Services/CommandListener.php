<?php

namespace App\Commander\Domain\Services;

use League\Tactician\Middleware;
use League\Tactician\CommandEvents\EventMiddleware;
use League\Tactician\CommandEvents\Event\CommandFailed;
use League\Event\EmitterInterface;

class CommandListener extends EventMiddleware
{
    public function execute($command, callable $next)
    {

        \Log::info("CommandListener::execute");

        return $next($command);
    }

}