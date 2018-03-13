<?php

/*if (session_id() == null){
    echo"no Logged";
}else{
    session_start();
echo("Hello! you're logged!()");
}
$_SESSION=[];
echo session_destroy();*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'] ?? null;
    $password_1 = $_POST['password_1'] ?? null;
    $password_2 = $_POST['password_2'] ?? null;
    
    echo 'ok' . "<br>";
    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = ($password_1 === $password_2 && strlen($password_1) >= 5);
    
    if ($usernameSuccess && $passwordSuccess) {
        try {
            $connection = service\DBConnector::getConnection();
        } catch (PDOException $exception) {
            http_response_code(500);
            echo 'A problem occured, contact support+' . ((string) $exception);
            exit(10);
        }
        
        $sql = "INSERT INTO user(username, password) VALUES (\"$username\", \"$password_1\")";
        $affected = $connection->exec($sql);
        
        if (! $affected) {
            echo implode(', ', $connection->errorInfo());
            return;
        }
        $id = $connection->lastInsertId();
        
        echo 'Store data';
        return;
    }
}
?>

<!DOCTYPE HTML>
<HTML>
	<head>
		<meta charset="UTF-8">
		<title>Register projet individuel PHP</title>		
		<style>
	    *{
	     transition-duration: 0.3s;
		}
		
		h1{
		text-align:center;
		Color : #FA00FA;
		text-decoration: underline;
		}
		
		p{
		
		color: #A20087;
		font-size:25px;
		}
		
		.bodyForm{
		margin: auto;
		text-align : center;
		width: 30%;
		background: linear-gradient(to bottom, #FC86CA 0%, #F213FD 100%);
		box-shadow: 0px 0px 10px 10px #FF99EE;
		border-radius:8px;
		}
		.userInput{
		padding-top:10px;
		}
		
		button{
		width:250px;
		padding :5px;
	    background-color : #7A0065;
	    color : #FEC7F5;
	    box-shadow: 0px 0px 5px 5px #E424C4;
	    border-radius: 5px;
		}
		
		button:hover{
		background-color : #E900C1;
		box-shadow: 0px 0px 5px 5px #E100CA;
		color : white;
		}
		
		
		</style>
	</head>
	<body >
	<div class="bodyForm">
	
	<h1>REGISTER <br/> My Warehouse: <br/> Little Poney </h1>

	<form action="/index.php/register" method="POST" >
	
		<div class="userInput">
    		<label for="username" >Your username:</label>
    		<input type="text" name="username" placeholder="Enter Username" value="<?php
    echo htmlentities($username ?? "")?>" />
    	</div>
    		<br/>
    		<br/>
    		<?php
    
    if (! ($usernameSuccess ?? true)) {
        ?>
    	<div>
    	 	<p>Error in your username</p>
		</div>
		<?php
    }
    ?>
	
		<label for="password_1">Your password:</label>
		<input type="password" name="password_1" placeholder="Enter Password"/>
		<br/>
		<br/>
		<?php

if (! ($passwordSuccess ?? true)) {
    ?>
		<div>
			<p>Error in your Password, min:5 characters!</p>
		</div>
		<?php
}
?>
        
		<label for="password_2">Confirm password:</label>
		<input type="password" placeholder="Confirm Password" name="password_2"/>
		<br/>
		<br/>
		<br/>
		<button  type="submit">SUBMIT</button>
		<br/>
		<p><a href="http://localhost/public/index.php">Back</a></p><br/>
        
		<br/>
		</form>
     </div>   
	</body>
	

</html> 

