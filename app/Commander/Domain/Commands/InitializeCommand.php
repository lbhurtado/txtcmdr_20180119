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
}
