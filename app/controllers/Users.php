<?php

class Users extends Controller{
    public function __construct(){
        //check the models folder for a file caller User.php
        $this->userModel = $this->model('User');



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
        }else{
            //check email in db
            if($this->userModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email is already taken';
            }
        }

         //validate name
         if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
        }

         //validate password
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
                //now we can register the user

                //hash the pasword
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                //register the ueser
                if($this->userModel->register($data)){
                    redirect('users/login');
                }else{
                    die('Something went wrong');
                };


        }else{
            //load the view with the errors
            $this->view('users/register',$data);
        }

       
        


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
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //initilize data
        $data = [
            
            'email' => trim($POST['email']),
            'password' => trim($POST['password']),
            'email_err' => '',
            'password_err' => '',
        ];

        //validate email is filled in
        if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
        }


        //validate email is filled in
        if(empty($data['password'])){
            $data['password_err'] = 'Please enter a password';
        }


        
         //make sure errors are empty
         if(empty($data['email_err'])  && empty($data['password_err'])){
             //validated
             die('SUCCESS');
     }else{
         //load the view with the errors
         $this->view('users/login',$data);
     }


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
