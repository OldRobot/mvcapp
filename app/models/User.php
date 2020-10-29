<?php

    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //register the user
        public function register($data){
            //create the prepared statment
            $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email,:password)');

            //bind the values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            //excecute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            };
        }

        //login User
        public function login($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email',$email);

            $row = $this->db->single();
            $hashed_password = $row->password;
            if(password_verify($password,$hashed_password)){
                //match passoword and hashed password
                //user can be logged in, return user
                //returns all data
                return $row;
            }else{
                //does not match
                return false;
                
            }
        }

        // find user by email
        public function findUserByEmail($email){
            //use the database class query
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //check the row, if more than zero, an email was found
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }

    }