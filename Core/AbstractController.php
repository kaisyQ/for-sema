<?php

abstract class AbstractController
{
    private const string VIEWS_DIR = __DIR__ . '/../views/';

    private const string BASE_TEMPLATE_EXTENSION = '.html';

    protected function renderView(string $view): Response
    {
        $response = new Response();
        $response->body = file_get_contents(self::VIEWS_DIR . $view . self::BASE_TEMPLATE_EXTENSION);
        $response->status = 200;
        $response->headers = [
            'Content-Type' => 'text/html',
        ];

        return $response;
    }
}