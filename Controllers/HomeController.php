<?php

class HomeController extends AbstractController
{
    #[Route("/home")]
    public function getHomePage(): Response
    {
        return $this->renderView('home');
    }
}