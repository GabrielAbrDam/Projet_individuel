<?php
require_once __DIR__ . '/../vendor/autoload.php';
$configs = require __DIR__ . '/../config/app.conf.php';

use service\DBConnector;
DBConnector::setConfig($configs['db']);

$map = [
    '/account' => __DIR__ . '/../src/controller/account.php',
    '' => __DIR__ . '/../src/public/index.php',
    '/register' => __DIR__ . '/../src/controller/register.php',
    '/login' => __DIR__ . '/../src/controller/login.php',
    '/index' => __DIR__ . '/../public/index.php'
];

$url = $_SERVER['REQUEST_URI'];

if (substr($url, 0, strlen('/index.php')) == '/index.php') {
    $url = substr($url, strlen('/index.php'));
} else if ($url == '/') {
    $url = '';
}

if (array_key_exists($url, $map)) {
   include $map[$url];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
      	<style>
      	*{
	     transition-duration: 0.3s;
		}
		
      	body{
       	text-align: center;
      	}
      
      	
      	h1{
      	color: #FF00E5;
      	text-decoration : underline;
      	}
      	
      	a{
      	text-decoration: none;
     
      	background: linear-gradient(to bottom, #FC86CA 0%, #F213FD 100%); 
      	color : #FFE6FC;      	
      	border-radius: 8px;
      	padding : 20px;
      	margin-top: 20px; 
      	box-shadow: 0px 0px 5px 5px #D593CC;
      	}
      	
      	a:hover{
      	background: linear-gradient(to bottom, #F213FD 0%, #FC86CA 100%);
      	color : white;  
      	box-shadow: 0px 0px 5px 5px white;
      	}
      	
      	.inputRegister{
      	margin-top : 80px;
      	}
      	</style>
       
    </head>
    <body>
    <section>
        <h1> WELCOM <BR> to MY WARREHOUSE : Little Poney </h1>
        <div class="inputRegister">
        	<p><a href="http://localhost/src/controller/register.php">To Register</a></p><br/>
        </div>
        <div class="inputLogin">	
        	<p><a href="http://localhost/src/controller/login.php ">To login</a></p>
        </div>
    </section>
    </body>
</html>