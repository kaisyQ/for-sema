<?php

class AdminController extends AbstractController
{
    #[Route("/admin")]
    public function getAdminPage(): Response
    {
        return $this->renderView('admin');
    }
}