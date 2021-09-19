<?php

namespace Nnjeim\Fetch;

use Exception;

class FetchException extends Exception
{
	/**
	 * @param  string  $method
	 * @return static
	 */
	public static function methodNotFoundException(string $method) {

		return new static(trans('fetch::messages.exceptions.method_not_found', compact('method')));
	}
}
