<?php

class HomeController extends BaseController
{
    public function index(): void
    {

        $alert = $_SESSION["alert"] ?? "";
        unset($_SESSION["alert"]);

        $this->loadView([
            "view"          => 'home/index',
            "title"         => 'Home',
            'alert'         => $alert,
            "scripts"       => $this->scripts,
            "stylesheets"   => $this->stylesheets,
        ]);
    }
}