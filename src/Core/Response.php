<?php

namespace Jason\Backend\Core;

use Stringable;

class Response implements Stringable
{
    public array $headers = [];

    public string $body;

    public int $status;

    public function __toString(): string
    {
        foreach ($this->headers as $name => $header) {
            header("$name: $header");
        }

        return $this->body;
    }
}