<?php

namespace Nnjeim\Fetch;

use GuzzleHttp\Client;

class FetchBuilder
{

	protected array $attributes = [];

	/**
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get(string $key)
	{
		return $this->attributes[$key] ?? null;
	}

	/**
	 * @param $key
	 * @param $value
	 */
	public function __set($key, $value)
	{
		$this->attributes[$key] = $value;
	}

	/**
	 * @return array
	 */
	public function fetch(): array
	{

		$this->send();

		return [
			'response' => $this->attributes['response'],
			'status' => $this->attributes['status'],
		];
	}

	private function send(): void
	{

		$http = new Client([
			'base_uri' => $this->baseUri,
		]);

		$requestMethod = strtolower($this->method) . ($this->async ? 'Async' : '');

		$requestArray = [
			'headers' => array_merge(config('fetch.headers'), $this->headers ?? []),
		];

		$requestArray[$this->bodyFormat] = $this->data;

		try {

			$request = $http->{$requestMethod}($this->url, $requestArray);

			$response = $this->async ? $request->wait() : $request;

			$this->response = json_decode($response->getBody(), config('fetch.json_encode_mode'));

			$this->status = $response->getStatusCode();

		} catch (\GuzzleHttp\Exception\ClientException $e) {

			$this->response = json_decode($e->getResponse()->getBody()->getContents(),
				config('fetch.json_encode_mode'));

			$this->status = $e->getCode();
		}
	}
}
