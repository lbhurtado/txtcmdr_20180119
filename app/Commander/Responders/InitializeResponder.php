<?php

namespace App\Commander\Responders;

use League\Tactician\Middleware;
use App\Commander\Domain\Resources\CommandResource;
use App\App\Responders\{Responder, ResponderInterface};

class InitializeResponder implements Middleware
{
    public function execute($command, callable $next)
    {        
        $retval = $next($command);

        \Log::info("InitializeResponder::execute");
        
        return (new CommandResource($command))
            ->response()
            // ->setStatusCode(422)
            ;
    }
}