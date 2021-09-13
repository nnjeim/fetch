<?php

namespace Nnjeim\Fetch;

class FetchHelper extends FetchFactory {

    /**
     * @param  array  $headers
     * @return $this|object
     */
    public function setHeaders(array $headers): object {

        $this->headers = $headers;

        return $this;
    }

    /**
     * @param  string|null  $baseUri
     * @return $this|object
     */
    public function setBaseUri(?string $baseUri = null): object {

        $this->baseUri = rtrim($baseUri, '/') . '/';

        return $this;
    }

    /**
     * @param  string  $method
     * @return $this
     */
    public function setMethod(string $method): object {

        $this->method = $method;

        return $this;
    }

    /**
     * @param  string  $url
     * @return $this
     */
    public function setUrl(string $url): object {

        $this->url = $url;

        return $this;
    }

    /**
     * @param  string  $format
     * @return $this
     */
    public function setBodyFormat(string $format): object {

        $this->bodyFormat = $format;

        return $this;
    }

    /**
     * @return $this|object
     */
    public function setAsync(): object {

        $this->async = true;

        return $this;
    }

    /**
     * @return $this|object
     */
    public function setData(array $data): object {

        $this->data = $data;

        return $this;
    }

    /**
     * @param  string  $url
     * @param  array  $data
     * @return array
     */
    public function get(?string $url = null, ?array $data = null): array {

        if ($url !== null) {
            $this->setUrl($url);
        }

        if ($data !== null) {
            $this->setData($data);
        }

        return $this
            ->setMethod('get')
            ->setBodyFormat('query')
            ->fetch();
    }

    /**
     * @param  string  $url
     * @param  array  $data
     * @return array
     */
    public function post(?string $url = null, ?array $data = null): array {

        if ($url !== null) {
            $this->setUrl($url);
        }

        if ($data !== null) {

            $this->setData($data);
        }

        return $this
            ->setMethod('post')
            ->setBodyFormat('form_params')
            ->fetch();
    }

    /**
     * @param  string  $url
     * @param  array  $data
     * @return array
     */
    public function put(?string $url = null, ?array $data = null): array {

        if ($url !== null) {
            $this->setUrl($url);
        }

        if ($data !== null) {

            $this->setData($data);
        }

        return $this
            ->setMethod('put')
            ->setBodyFormat('form_params')
            ->fetch();
    }

    /**
     * @param  string  $url
     * @param  array  $data
     * @return array
     */
    public function delete(?string $url = null, ?array $data = null): array {

        if ($url !== null) {
            $this->setUrl($url);
        }

        if ($data !== null) {

            $this->setData($data);
        }

        return $this
            ->setMethod('delete')
            ->setBodyFormat('query')
            ->fetch();
    }

    /**
     * @param  string  $url
     * @param  array  $data
     * @return array
     */
    public function upload(?string $url = null, ?array $data = null): array {

        if ($url !== null) {
            $this->setUrl($url);
        }

        if ($data !== null) {

            $this->setData($data);
        }

        return $this
            ->setMethod('post')
            ->setBodyFormat('multipart')
            ->fetch();
    }
}
