<?php

namespace Jason\Backend\Controllers;

use Jason\Backend\Core\AbstractController;
use Jason\Backend\Core\Response;
use Jason\Backend\Core\Route;

class AboutController extends AbstractController
{
    #[Route("/about")]
    public function getAboutPage(): Response
    {
        return $this->renderView('about');
    }
}