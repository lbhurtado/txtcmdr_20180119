<?php

namespace App\Commander\Domain\Services;

use App\Commander\Domain\Exceptions\CommandValidationException;
use League\Tactician\Middleware;
use Validator;

class CommandValidator implements Middleware
{
    protected $rules = [
        'mobile' => 'required',
        'keyword' => 'required',
        'arguments' => 'required'
    ];

    public function execute($command, callable $next)
    {
        \Log::info("CommandValidator::execute");

        $validator = Validator::make((array) $command, $this->rules);
        if ($validator->fails()) {
            // throw new CommandValidationException($command, $validator);
            throw new CommandValidationException("hello");
        }

        return $next($command);
    }

}