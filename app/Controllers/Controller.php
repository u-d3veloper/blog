<?php

namespace Controllers;

include(dirname(__DIR__).'/database/DBConnection.php');
use Database\DBConnection;

abstract class Controller
{
    protected $db;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        include(VIEWS.$path.'.php');
    
        $content = ob_get_clean();
        include(VIEWS.'layout.php');
    }
}