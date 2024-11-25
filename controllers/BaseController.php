<?php

class BaseController extends RenderView
{
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
}
