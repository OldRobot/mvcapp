<?php

//controller

class Skills extends Controller{
    public function __construct(){
        //check the models folder for a file caller User.php
        $this->skillModel = $this->model('Skill');



    }

    //default method
    public function index(){
        
        $skills = $this->skillModel->loadJSON("number1");

        //echo $skills;
        
        $data =[
            'skills' => $skills
        ];
        //echo $skills['test']['title'];

        $this->view('skills/index', $data);
        //echo APPROOT;
    }

    public function getQuestionNumber(){
        //this should get the question number the student got 
        //too, 1 if not started
        //will query db
    }

}
