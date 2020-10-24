<?php

class Users extends Controller{
    public function __constructor(){

    }

    public function register(){
    //check for post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //process form
    }else{
        //load the form
        //initalize data, will save form if error
        $data = [
            'name' =>'',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];
        //load view
        $this->view('users/register',$data);
    }

    }
}
