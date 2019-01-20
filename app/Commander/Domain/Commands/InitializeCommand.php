<?php

namespace App\Commander\Domain\Commands;

class InitializeCommand
{
	public $mobile;

	public $keyword;

	public $arguments;

    public function __construct($mobile, $keyword, $arguments)
    {
 		$this->mobile = $mobile;
 		$this->keyword = $keyword;
 		$this->arguments = $arguments;
    }

    public function getArguments()
    {
    	return [
    		'mobile' => $this->mobile,
    		'keyword' => $this->keyword,
    		'arguments' => $this->arguments,
    	];
    }
}
