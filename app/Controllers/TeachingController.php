<?php 

    namespace Controllers;

class TeachingController extends Controller
{
    public function index(array $params=null){
        $tree = $this->buildTree('cours');

        $statement = $this->db->getPDO()->prepare("SELECT * FROM posts WHERE slug=? AND type='cours'");
        $statement->execute([$params['ref']]);
        $courses = $statement->fetch();
        
        return $this->view('blog.teaching',[$courses,$tree]);
    }
}