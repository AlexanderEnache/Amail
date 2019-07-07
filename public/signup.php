
<?php

	if(isset($_POST["submit"])){
		$connection = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b77cd357d78c16', 'd98eba5a', 'heroku_034f5952d66454c');
		$query = "Select * from userlog";
		$result = mysqli_query($connection, $query);
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		if($_POST["password"] == $_POST["repassword"] && isUsernameOk($username, $result)){
			$query = "insert into userlog(username, password) value('$username', '$password')";
			mysqli_query($connection, $query);
			$query = "create table $username(id serial, mail varchar(1000000), user varchar(100), subject varchar(50))";
			mysqli_query($connection, $query);
			
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			
			header("location:home.php");
		}else{			
			echo '<h1>User already exists</h1>';		
		}
		
	}
	
	function isUsernameOk($username, $result){
		while($current = mysqli_fetch_assoc($result)){
			if($current['username'] == $username){
				return false;
			}
		}
		return true;
	}
	
	//////////////////////////////////////////
		
		/* $result = mysqli_query($connection, "Select * from userlog");
		
		while($current = mysqli_fetch_assoc($result)){
			echo '<pre>';
				print_r($current['username']);
			echo '</pre>';
		}
			 */
	//////////////////////////////////////////
	
?>

<html>
	<head>
		<title>PHP Demo</title>
		<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<div class="ctr center">
			<form class='active' action="signup.php" method="post">
			<h1>Document</h1>
				<input type="text" name="username" placeholder="username"/>
				<br>
				<input type="password" name="password" placeholder="password"/>
				<br>
				<input type="password" name="repassword" placeholder="retype password"/>
				<br>
				<input class='button' type="submit" name="submit">
			</form>
		</div>
	</body>
</html>



















