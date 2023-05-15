<?php

namespace Modules\_base;

use System\Contracts\IController;
use System\Template;

class Controller implements IController
{
	protected	string	$title		= '';
	protected	string	$content	= '';
	protected	array	$env;

	public function setEnvironment( array $urlParams ): void
	{
		$this->env = $urlParams;
	}

	public function render(): string
	{
		return Template::render( __DIR__ . '/v_main.php', [
			'title'		=> $this->title,
			'content'	=> $this->content
		] );
	}
}

