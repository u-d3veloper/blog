<?php

    namespace Controllers;

class HomeController extends Controller
{
    public function index(array $params = null){
        return $this->view('blog.home');
    }
}