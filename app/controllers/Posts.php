<?php
    class Posts extends Controller {

        public function __construct(){
            //this will stop a user viewing the whole page 
            //if not logged in
            if(!isLoggedIn()){
                redirect('users/login');
            }
        }

        public function index(){

            $data =[];

            $this->view('posts/index');
        }
    }