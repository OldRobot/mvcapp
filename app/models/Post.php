<?php
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query('SELECT *,
                              posts.id as postId,
                              users.id as userId,
                              posts.created_at as postCreated,
                              users.created_at as usersreated
                              FROM posts
                              INNER JOIN users
                              ON posts.user_id = users.id
                              ORDER BY posts.created_at DESC 
                              ');
            $results = $this->db->resultSet();

            return $results;
        }

        public function addPost($data){
              //create the prepared statment
              $this->db->query('INSERT INTO posts(title, user_id,body) VALUES(:title, :user_id, :body)');

              //bind the values
              $this->db->bind(':title', $data['title']);
              $this->db->bind(':user_id', $data['user_id']);
              $this->db->bind(':body', $data['body']);
  
              //excecute
              if($this->db->execute()){
                  return true;
              }else{
                  return false;
              };
        }

        public function getPostById($id){
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            
            return $row;


        }

    }