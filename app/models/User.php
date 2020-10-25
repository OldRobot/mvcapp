<?php

    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
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