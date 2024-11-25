<?php

class Core
{
    public function run($routes)
    {
        $url = "/";

        isset($_GET["url"]) ? $url .= $_GET["url"] : "";

        ($url != "/") ? $url = rtrim($url, "/") : $url;

        $routerFound = false;

        foreach ($routes as $path => $controller) {
            $pattern = "#^" . preg_replace("/{id}/", "(\w+)", $path) . "$#";

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $routerFound = true;
                // Popula as duas variáveis (índices) com os dois retornos do $controller
                [$urlController, $urlAction] = explode("@", $controller);

                require_once __DIR__ . "/../controllers/" . $urlController . ".php";

                $newController = new $urlController();
                $newController->$urlAction($matches);
            }
        }

        if (!$routerFound) {
            echo $this->notFound();exit;
        }
    }

    public function notFound(): string      
    {
        $html = "<body><div class='container'><h1>404</h1><p>Página Não Encontrada</p><a href='/'>Voltar para a Página Inicial</a></div></body>";
        $html .= "<style>body {background-color: #f4f4f4;font-family: Arial, sans-serif;display: flex;justify-content: center;align-items: center;height: 100vh;margin: 0;}.container {text-align: center;background-color: #fff;padding: 20px;border-radius: 8px;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);}</style>";
        return $html;
    }

    public function loadEnv($file): void
    {
        if (!file_exists($file)) {
            die("Arquivo com variáveis de ambiente não foi encontrado.");
        }
    
        // Lê o conteúdo do file
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        // Itera sobre cada linha e define a variável de ambiente
        foreach ($lines as $line) {
            // Ignora comentários (linhas que começam com #)
            if (strpos(trim($line), "#") === 0) {
                continue;
            }
    
            // Divide a linha em chave e valor
            list($key, $value) = explode("=", $line, 2);
    
            // Remove espaços extras
            $key = trim($key);
            $value = trim($value);
    
            // Define a variável de ambiente
            putenv("{$key}={$value}");
        }
    }
    
}