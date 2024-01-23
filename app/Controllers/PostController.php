<?php

    namespace Controllers;

class PostController extends Controller
{
    public function post(array $params=null){
        return $this->view('blog.posts');
    }
    public function show(array $params=null){
        return $this->view('blog.show',$params['id']);
    }
}