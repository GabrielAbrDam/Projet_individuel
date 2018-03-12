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
        <meta charset="ISO-8859-1">
        <title>Index</title>
    </head>
    <body>
    	<div>
    		<p><a href="http://localhost/index.php/register">To log Register</a></p><br/>
    		<p><a href="http://localhost/index.php/login ">To log in</a></p>
    	</div>
    
    </body>
</html>