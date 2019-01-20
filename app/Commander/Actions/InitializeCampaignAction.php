<?php

namespace App\Commander\Actions;

use Illuminate\Http\Request;
use App\Commander\{
		Domain\Commands\InitializeCommand,
		Domain\Handlers\InitializeHandler,
		Domain\Services\CommandListener,
		Domain\Services\CommandValidator,
		Responders\InitializeResponder
	};
use Joselfonseca\LaravelTactician\CommandBusInterface;

class InitializeCampaignAction
{
	protected $bus;

	protected $request;

	protected $command = InitializeCommand::class;

	protected $handler = InitializeHandler::class;

	protected $middlewares = [
		CommandListener::class,
    	CommandValidator::class,
    	InitializeResponder::class
	];

	public function __construct(CommandBusInterface $bus, Request $request)
	{
	    $this->bus = $bus;
	    $this->request = $request;
	}

	public function __invoke()
	{
        $this->bus->addHandler($this->command, $this->handler);

        return $this->bus->dispatch($this->command, $this->getData(), $this->middlewares);
	}

	protected function getData()
	{
		return $this->request->only('mobile', 'keyword', 'arguments');
	}
}