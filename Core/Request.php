<?php

class Request
{
    public string $method;

    public string $uri;

    public string $serverProtocol;

    public function __construct(string $method, string $uri, string $serverProtocol)
    {
        $this->serverProtocol = $serverProtocol;
        $this->method = $method;
        $this->uri = $uri;
    }
}