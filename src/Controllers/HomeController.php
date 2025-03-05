<?php

namespace Jason\Backend\Controllers;

use Jason\Backend\Core\AbstractController;
use Jason\Backend\Core\Response;
use Jason\Backend\Core\Route;
use Jason\Backend\Entity\Post;

class HomeController extends AbstractController
{
    /** @var array<Post> */
    private array $posts;
    public function __construct()
    {
        $this->posts = [
            (new Post())
                ->setTitle('Quote')
                ->setText('A well-known quote, contained in a blockquote element.')
                ->setAuthor('Someone famous in Source Title'),
            (new Post())
                ->setTitle('Quote')
                ->setText('A well-known quote, contained in a blockquote element.')
                ->setAuthor('Someone famous in Source Title'),
            (new Post())
                ->setTitle('Quote')
                ->setText('A well-known quote, contained in a blockquote element.')
                ->setAuthor('Someone famous in Source Title'),
        ];
    }

    #[Route("/home")]
    public function getHomePage(): Response
    {
        return $this->renderView('home', [
            'posts' => $this->posts
        ]);
    }

    #[Route("/home/create")]
    public function create(): Response
    {
        return $this->renderView('home', [
            'posts' => $this->posts
        ]);
    }
}