<?php 

    namespace Controllers;

class AboutController extends Controller
{
    public function index(array $params=null){
        return $this->view('blog.about',$params);
    }
    
}