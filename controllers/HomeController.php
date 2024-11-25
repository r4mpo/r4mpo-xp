<?php

class HomeController extends BaseController
{
    public function index(): void
    {
        $urlCard = $this->getRouteBase() . "/portfolio";
        $alert = "";

        if (!empty($_SESSION["alert"])) {
            $alert = $_SESSION["alert"] ?? "";
            unset($_SESSION["alert"]);
        }

        $this->loadView([
            "view"          => 'home/index',
            "title"         => 'Home',
            'alert'         => $alert,
            "scripts"       => $this->scripts,
            "stylesheets"   => $this->stylesheets,
            "urlCard"       => $urlCard
        ]);
    }
}
