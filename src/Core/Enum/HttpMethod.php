<?php

declare(strict_types=1);

namespace Jason\Backend\Core\Enum;

enum HttpMethod: string
{
    case POST = 'POST';
    case GET = 'GET';
    case DELETE = 'DELETE';
    case PUT = 'PUT';
}