

<html>
	<head>
		<title>PHP Demo</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>

	<body style="background-color: #e3ef34;">
	
	<?php
		session_start();
	?>
	
	<?php
		
		$connection = mysqli_connect('localhost', 'root', '', 'login');
		$query = "Select * from " . $_SESSION['username'] . " where id=" . $_GET['q'] . ';';
		
		$result = mysqli_query($connection, $query);
			
		$current = mysqli_fetch_assoc($result);
			
		echo '<div class="ctr" style="width:90%;height:auto;margin:15px;position:absolute;left:50%;top: 50%;transform: translate(-50%, -50%);">';
		echo '<h1>From ' . $current['user'] . '</h1>';
		echo '<h3>' . $current['subject'] . '</h3>';
		echo '<p>' . $current['mail'] . '</p>';
			/* if($current){
				echo '<div>';
					print_r($current['mail']);
				echo '</div>';
			}else{
				echo '<p class="alert">wrong username or password</p>';
			} */
		echo '</div>';
		
	?>
		
	</body>
</html>

