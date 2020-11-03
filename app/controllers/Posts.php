<?php
    class Posts extends Controller {

        public function __construct(){
            //this will stop a user viewing the whole page 
            //if not logged in
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
        }

        public function index(){
            //get posts
            $posts = $this->postModel->getPosts();

            $data =[
                'posts' => $posts
            ];

            $this->view('posts/index',$data);
        }

        public function add(){
            //check to see if there has been a post
            if($_SERVER['REQUEST_METHOD']=='POST'){
              
                                //if data is submitted , sanatise the post
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                
                $data =[
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //validate 
                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter a title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }
                
                //make sure there are no errors
                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->postModel->addPost($data)){
                        flash('post_message','Post Added');
                        redirect('posts');
                    }else{
                        die('Something went wrong');
                    }

                }else{
                    //load the view with the errors
                    $this->view('posts/add',$data);
                }

             

            }else{
                //make a bank form / no data
                $data =[
                    'title' => '',
                    'body' => ''
                ];
    
                $this->view('posts/add',$data);
            }
            
   
        }
    }