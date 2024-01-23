<?php

    namespace Controllers;

class PostController extends Controller
{
    public function index(array $params=null){
        return $this->view('blog.posts');
    }
    public function show(array $params=null){

        $statement = $this->db->getPDO()->prepare("SELECT * FROM posts where posts.id = ?");
        $statement->execute([$params['id']]);
        $posts = $statement->fetch();
        return $this->view('blog.show',$posts); 
    }

}