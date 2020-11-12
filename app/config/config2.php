<?php
//This configuration file should be changed to your own settings
//The file should be renamed to config.php
//My config.php is not uploaded as it listed in my ginore file.

//hello this is a test
//please chage the  RewriteBase /mvcapp/public  in  public/.htaccess
//mvcapp is the name of my root folder for the appliucation
//need a ☕

//DB Params - you need your own parameters here
define('DB_HOST', 'localhost');
define('DB_USER','root');
define('DB_PASS', '123456');
define('DB_NAME', 'mvc');

//the database for this example is called mvc,
//it has a table called posts, with 'id' , 'title'
//id is number auto increment, and post is 256 varchar
//add a few records.


//app root
define( 'APPROOT', dirname(dirname(__FILE__)));


//URL root  - probably local host
define( 'URLROOT', 'localhost');

//site name - change your site name
define( 'SITENAME', 'TestPHP');

//
