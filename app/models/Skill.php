<?php

class Skill{
    private $db;
    private $jsonData;

    public function __construct(){
        $this->db = new Database;
    }

    public function loadJSON($filename){
        
        $jsonData =file_get_contents(APPROOT . "/" . "assessments/" . $filename .'.json');
        $json = json_decode($jsonData,true);
        
        
        
        return $json;
    }


}