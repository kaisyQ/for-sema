<?php

class AdminController extends AbstractController
{
    public function getAdminPage(): Response
    {
        return $this->renderView('admin');
    }
}