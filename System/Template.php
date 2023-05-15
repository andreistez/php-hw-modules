<?php

namespace System;

class Template
{
	public static function render( string $path, array $vars = [] ): string
	{
		extract( $vars );
		ob_start();
		include $path;

		return ob_get_clean();
	}
}

