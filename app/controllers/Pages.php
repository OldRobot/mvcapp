<?php
    class Pages extends Controller{

        public function __construct(){
           
        }

        //default method
        public function index(){

            
            //will get data here from model
            $data = ['title' => 'SharePosts',
                     'description' => 'Simple social network using PHP MVC framework.'
                    ];

           


            $this->view('pages/index',$data);
        }


        public function about(){
            $data = ['title' => 'about us',
                     'description' => 'App to share posts with other users.'];
            $this->view('pages/about', $data);
        }





    }