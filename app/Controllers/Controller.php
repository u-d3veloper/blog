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

    protected function view(string $path, mixed $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        include(VIEWS.$path.'.php');
        $source= explode(DIRECTORY_SEPARATOR,$path)[1];
        $content = ob_get_clean();
        include(VIEWS.'layout.php');
    }

    protected function buildTree(string $type){
        $getCategoriesQuery = "SELECT name FROM category";

        $statement = $this->db->getPDO()->prepare($getCategoriesQuery);
        $statement->execute();
        $categories = $statement->fetchAll();

        $tree = array();

        foreach ($categories as $category) {
            $statement = $this->db->getPDO()->prepare("SELECT title,slug FROM posts JOIN category ON posts.id_category = category.id WHERE name=? AND posts.type=? ORDER BY posts.id DESC");
            $statement->execute([$category->name,$type]);
            $posts = $statement->fetchAll();
            $tree[$category->name] = $posts;
        }

        return $tree;
    
    }

}