
<?php

	if(isset($_POST["submit"])){
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$connection = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b77cd357d78c16', 'd98eba5a', 'heroku_034f5952d66454c');
		$query = "SELECT * FROM userlog where username = '$username' AND password = '$password'";
	
		$result = mysqli_query($connection, $query);
		
		$current = mysqli_fetch_assoc($result);
		
		if($current){
			echo '<pre>';
				print_r(strlen($current['username']));
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('Location: home.php?l=5');
			echo '</pre>';
		}else{
			echo '<p class="alert">wrong username or password</p>';
		}
		
	}
	
?>

<html>
	<head>
		<title>PHP Demo</title>
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>

	<body>
		
		<div class='ctr center'>
			<form class='active' action="ember.php" method="post">
			<h1>Log in to Amail</h1>
				<input type="text" name="username" placeholder="username"/>
				<br>
				<input type="password" name="password" placeholder="password"/>
				<br>
				<br>
				<input class='button' type="submit" name="submit" style="border-radius:20px;" value="login">
				<br>
				<br>
				<a href='/signup.php'>Dont have an account yet</a>
			</form>
		</div>
		
		<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
		<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
		<script src="https://unpkg.com/babel-standalone@6/babel.min.js" ></script>
	
	</body>
</html>


