<?php

    namespace Controllers;

class LoginController extends Controller{
    public function form(array $params=null){
       return $this->view('blog.login',$params);
    }
}
