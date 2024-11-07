<?php

class RenderView
{
    public function loadView($args)
    {
        extract($args);
        require_once __DIR__ . "/../views/base.php";
    }

    public function refsLoad($refs, $type): string
    {
        if (!is_array($refs)) {
            throw new Exception("Javascript files are in invalid format", 1);
        }

        $files = "";

        foreach ($refs as $ref) {
            if ($type === "js") {
                $files .= "<script src='$ref'></script>\n";
            } elseif ($type === "css") {
                $files .= "<link href='$ref' rel='stylesheet'>\n";
            }
        }

        return $files;
    }
}
