<?php

class Users extends Controller{
    public function __constructor(){

    }

    public function register(){
    //check for post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //process form
        //sanatise post data
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //initilize data
        $data = [
            'name' => trim($POST['name']),
            'email' => trim($POST['email']),
            'password' => trim($POST['password']),
            'confirm_password' => trim($POST['confirm_password']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];


        //validate email
        if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
        }

         //validate name
         if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
        }

         //validate email
        if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
        }elseif (strlen($data['password'])<6) {
            $data['password_err'] = 'Password must be at least 6 characters';
        }

        //validate name
        if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Please confirm password';
        }else{
            if($data['confirm_password'] != $data['password']){
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        }

        //make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) 
            && empty($data['confirm_password_err'])){
                //validated
                die('SUCCESS');
        }else{
            //load the view with the errors
            $this->view('users/register',$data);
        }

        // got to 3.03 going to next valdiate the login.


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

    public function login(){
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //process form

        }else{
            //load the form
            //initalize data, will save form if error
            $data = [ 
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            
            ];
            //load view
            $this->view('users/login',$data);
        }
    
        }
}
