<?php

namespace Jason\Backend\Controllers;

use Jason\Backend\Core\AbstractController;
use Jason\Backend\Core\Response;
use Jason\Backend\Core\Route;

class AdminController extends AbstractController
{
    #[Route("/admin")]
    public function getAdminPage(): Response
    {
        return $this->renderView('admin');
    }
}