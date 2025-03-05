<?php

namespace Jason\Backend\Core;

use Jason\Backend\Core\Enum\HttpMethod;

class Request
{
    private HttpMethod $method;

    private string $uri;

    private string $serverProtocol;

    public function __construct(HttpMethod $method, string $uri, string $serverProtocol)
    {
        $this->serverProtocol = $serverProtocol;
        $this->method = $method;
        $this->uri = $uri;
    }

    public function getMethod(): HttpMethod
    {
        return $this->method;
    }

    public function setMethod(HttpMethod $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;
        return $this;
    }

    public function getServerProtocol(): string
    {
        return $this->serverProtocol;
    }

    public function setServerProtocol(string $serverProtocol): self
    {
        $this->serverProtocol = $serverProtocol;
        return $this;
    }
}
