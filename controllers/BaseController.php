<?php

class BaseController extends RenderView
{
    protected $stylesheets;
    protected $scripts;

    public function __construct()
    {
        session_start();
        $this->scripts = $this->refs("js");
        $this->stylesheets = $this->refs(type: "css");
    }

    public function getRouteBase(): string
    {
        // Pega o protocolo (http ou https)
        $protocolo = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http";

        // Pega o domínio (exemplo: localhost)
        $dominio = $_SERVER["HTTP_HOST"];

        // Pega a parte do caminho da URL (sem a query string)
        $uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), "/");

        // Monta a URL base
        $url_base = $protocolo . "://" . $dominio . $uri;

        return $url_base;
    }

    public function refs($type): string
    {
        $files = [];

        if ($type === "js") {
            $files = [
                "public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
                "public/assets/vendor/aos/aos.js",
                "public/assets/vendor/typed.js/typed.umd.js",
                "public/assets/vendor/purecounter/purecounter_vanilla.js",
                "public/assets/vendor/waypoints/noframework.waypoints.js",
                "public/assets/vendor/glightbox/js/glightbox.min.js",
                "public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js",
                "public/assets/vendor/isotope-layout/isotope.pkgd.min.js",
                "public/assets/vendor/swiper/swiper-bundle.min.js",
                "public/assets/js/main.js"

            ];
        }

        if ($type === "css") {
            $files = [
                "public/assets/vendor/bootstrap/css/bootstrap.min.css",
                "public/assets/vendor/bootstrap-icons/bootstrap-icons.css",
                "public/assets/vendor/aos/aos.css",
                "public/assets/vendor/glightbox/css/glightbox.min.css",
                "public/assets/vendor/swiper/swiper-bundle.min.css",
                "public/assets/css/main.css"
            ];
        }

        $refs = $this->refsLoad($files, $type);
        return $refs;
    }
}