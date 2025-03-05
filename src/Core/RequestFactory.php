<?php

declare(strict_types=1);

namespace Jason\Backend\Core;

use Jason\Backend\Core\Enum\HttpMethod;

class RequestFactory 
{
    private const REQUEST_METHOD = 'REQUEST_METHOD';
    private const REQUEST_URI = 'REQUEST_URI';
    private const SERVER_PROTOCOL = 'SERVER_PROTOCOL';
     

    public static function create(): Request
    {
        $httpMethod = HttpMethod::tryFrom(self::getFromServerVarByKey(self::REQUEST_METHOD));

        if($httpMethod === null) {
            throw new \Exception('Http method is not allowed!');
        }

        return new Request(
            $httpMethod,
            self::getFromServerVarByKey(self::REQUEST_URI),
            self::getFromServerVarByKey(self::SERVER_PROTOCOL),
        );
    }

    private static function getFromServerVarByKey(string $key): string
    {
        return $_SERVER[$key];
    }
}
