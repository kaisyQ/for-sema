<?php

class AboutController extends AbstractController
{
    public function getAboutPage(): Response
    {
        return $this->renderView('about');
    }
}