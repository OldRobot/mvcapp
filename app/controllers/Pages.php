<?php
    class Pages extends Controller{

        public function __construct(){
           
        }

        //default method
        public function index(){

            
            //will get data here from model
            $data = ['title' => 'welcome',
                    ];

           


            $this->view('pages/index',$data);
        }


        public function about(){
            $data = ['title' => 'about us'];
            $this->view('pages/about', $data);
        }





    }