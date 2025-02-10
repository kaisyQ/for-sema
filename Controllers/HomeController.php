<?php

class HomeController extends AbstractController
{
    public function getHomePage(): Response
    {
        return $this->renderView('home');
    }
}