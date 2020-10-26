<?php
    //page redirect helper function
    function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }