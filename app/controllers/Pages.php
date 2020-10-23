<?php
    class Pages extends Controller{

        public function __construct(){
           $this->postModel = $this->model('Post');
        }

        //default method
        public function index(){

            $posts = $this->postModel->getPosts();
            //will get data here from model
            $data = ['title' => 'welcome',
                     'posts' => $posts
                    ];

           


            $this->view('pages/index',$data);
        }


        public function about(){
            $data = ['title' => 'about us'];
            $this->view('pages/about', $data);
        }





    }