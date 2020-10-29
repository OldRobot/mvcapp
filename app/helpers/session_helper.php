<?php
    //this will get loaded into every page
    session_start();

    //flash message helper
    //Example - flash('register_success','you are now registered');
    //Display in View - <?php echo flash(..........); etc...
    function flash($name = '', $message = '', $class = 'alert alert-success'){
        //this uses the default bootstrap altert success class (green box)
        
        if(!empty($name)){
            //check its not already set and there is a message
            //this will be because we are setting a message
            //the message will then be stored in the name, and 
            //when its called by the page it will didplay the message.
            if(!empty($message) && empty($_SESSION[$name])){

                //make sure the $_SESSIONS are not set
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name. '_class'])){
                    unset($_SESSION[$name. '_class']);
                }
                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;

            }elseif (empty($message) && !empty($_SESSION[$name])) {
                //If the page is calling this to display a message
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
                echo '<div class="'.$class.'" id ="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }

    } 

     //check if a user is logged in or not
     function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }