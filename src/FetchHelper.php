<?php

namespace Nnjeim\Fetch;

use Nnjeim\Fetch\FetchException;
use Nnjeim\Fetch\FetchInterface;
use Nnjeim\Fetch\FetchBuilder;

class FetchHelper extends FetchBuilder implements FetchInterface
{
	/**
	 * @param  array  $headers
	 * @return $this
	 */
	public function setHeaders(array $headers): self
	{
		$this->headers = $headers;

		return $this;
	}

	/**
	 * @param  string|null  $baseUri
	 * @return $this
	 */
	public function setBaseUri(?string $baseUri = null): self
	{
		$this->baseUri = rtrim($baseUri, '/') . '/';

		return $this;
	}

	/**
	 * @param  string  $method
	 * @return $this
	 */
	public function setMethod(string $method): self
	{
		$this->method = $method;

		return $this;
	}

	/**
	 * @param  string  $url
	 * @return $this
	 */
	public function setUrl(string $url): self
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * @param  string  $format
	 * @return $this
	 */
	public function setBodyFormat(string $format): self
	{
		$this->bodyFormat = $format;

		return $this;
	}

	/**
	 * @return $this
	 */
	public function setAsync(): self
	{
		$this->async = true;

		return $this;
	}

	/**
	 * @return $this
	 */
	public function setData(array $data): self
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * @param $method
	 * @param $args
	 * @return array
	 * @throws FetchException
	 */
	public function __call($method, $args)
	{
		$methods = [
			'get' => [
				'bodyFormat' => 'query',
				'verb' => 'get',
			],
			'post' => [
				'bodyFormat' => 'form_params',
				'verb' => 'post',
			],
			'put' => [
				'bodyFormat' => 'form_params',
				'verb' => 'put',
			],
			'delete' => [
				'bodyFormat' => 'query',
				'verb' => 'delete',
			],
			'upload' => [
				'bodyFormat' => 'multipart',
				'verb' => 'post',
			],
		];

		if (in_array(strtolower($method), array_keys($methods))) {

			[$url, $data] = [...$args] + ['', null];

			$this->setUrl($url);

			if ($data !== null) {
				$this->setData($data);
			}

			['verb' => $verb, 'bodyFormat' => $bodyFormat] = $methods[strtolower($method)];

			return $this
				->setMethod($verb)
				->setBodyFormat($bodyFormat)
				->fetch();
		}

		throw FetchException::methodNotFoundException($method);
	}
}
