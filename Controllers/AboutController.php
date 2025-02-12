<?php

class AboutController extends AbstractController
{
    #[Route("/about")]
    public function getAboutPage(): Response
    {
        return $this->renderView('about');
    }
}