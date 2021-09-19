<?php

namespace Nnjeim\Fetch;

interface FetchInterface
{
	/**
	 * @param  array  $headers
	 * @return $this
	 */
	public function setHeaders(array $headers): self;

	/**
	 * @param  string|null  $baseUri
	 * @return $this
	 */
	public function setBaseUri(?string $baseUri = null): self;

	/**
	 * @param  string  $method
	 * @return $this
	 */
	public function setMethod(string $method): self;

	/**
	 * @param  string  $url
	 * @return $this
	 */
	public function setUrl(string $url): self;

	/**
	 * @param  string  $format
	 * @return $this
	 */
	public function setBodyFormat(string $format): self;

	/**
	 * @return $this
	 */
	public function setAsync(): self;

	/**
	 * @return $this
	 */
	public function setData(array $data): self;
}
