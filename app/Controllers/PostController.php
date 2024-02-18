<?php

    namespace Controllers;

class PostController extends Controller
{
    public function index(array $params=null){
        $tree = $this->buildTree('ressource');

        $statement = $this->db->getPDO()->prepare("SELECT * FROM posts WHERE slug=? AND type='ressource'");
        $statement->execute([$params['ref']]);
        $posts = $statement->fetch();

        return $this->view('blog.posts',[$posts,$tree]);
    }

}