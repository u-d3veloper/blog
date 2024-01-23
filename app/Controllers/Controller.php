<?php

namespace Controllers;

class Controller
{
    public function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        include(VIEWS.$path.'.php');
        
        if ($params) {
            $params = extract($params);
        }
        $content = ob_get_clean();
        include(VIEWS.'layout.php');
    }
}