<?php

/*
 *Base Controller
 *Loads all models and views
 */
class Controller {
    //load model
    public function model($model){
        //require model file
        require_once '../app/models/' . $model . '.php';

        //instantiate the model
        // ie if user is past in  --   new User()
        return new $model();
    }


    //load view
    public function view($view, $data =[]){
        //check for the view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            //the view does not exist
            die('View does not exist');
        }
    }
}