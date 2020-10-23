<?php

/*
 * App Core Class
 * Creates URL & loads core controller
 * URL Format  - /controller/method/params
 */
class Core { 
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function __construct(){
        //print_r($this->getUrl());

        $url  = $this->getUrl();
        //if(!isset($url)){
        //    $url = 'Pages'; //a hack to make sure its not empty
        //}
        //look in controllers for first value, from index.php
        if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            //set  as current conntroller
            $this->currentController  = ucwords($url[0]);
            //unset the 0 index
            unset($url[0]);
        }
        //require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller class.
        // eg $pages = new pages
        $this->currentController = new $this->currentController;

        //check for the second part of the url
        if(isset($url[1])){
            //check to see if the method exists in the controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod =$url[1];
                unset($url[1]);
            }
        }

        //get params, does it have them or will it be empty?
        $this->params = $url ? array_values($url) : [];

        //call a callback with array of params
        call_user_func_array([$this->currentController, 
                              $this->currentMethod],
                              $this->params);


    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } 
    }
 
}


 