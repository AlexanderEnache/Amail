 
<?php
	session_start();
	$_SESSION['list'] = (isset($_GET['l']) ? $_GET['l'] : '5');
	// echo $_SESSION['list'];
	
	if(isset($_POST['submit'])){
		$connection = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b77cd357d78c16', 'd98eba5a', 'heroku_034f5952d66454c');
		$query = "insert into " . $_POST['recipient'] . "(mail, user, subject) " . "values(" . "'" . $_POST['mail'] . "'" . "," . "'" . $_SESSION['username'] . "'" . "," . "'" . $_POST['subject'] . "'" . ");";
		//echo $query;
		$result = mysqli_query($connection, $query);
	}
	
	if(isset($_POST['delete'])){
		$connection = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b77cd357d78c16', 'd98eba5a', 'heroku_034f5952d66454c');
		$query = "delete from " . $_SESSION['username'] . " where id=" . $_POST['id'];
		//echo $query;
		$result = mysqli_query($connection, $query);
	}
	
?>

<html>
	<head>
		<title>PHP Demo</title>
		<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>

	<body>
	
	<a href="/ember.php" style="text-decoration:none">Logout</a>
	
	<div>
	
		<div class='compose'>
			<h1>Hello <?php echo $_SESSION['username'] ?></h1>
			<form class='active' action="home.php" method="post">
				<input type="text" name="recipient" placeholder="Recipient"/>
				<br>
				<input type="text" name="subject" placeholder="Subject"/>
				<br>
				<textarea style='resize: none;' class='area' name="mail" placeholder="Mail"></textarea>
				<br>
				<br>
				<input class='button' type="submit" name="submit" value="Send" style="border-radius:20px;" >
				<br>
			</form>
		</div>
		
		<div class="inbox">
		
		<h1>Inbox</h1>
		
			<?php
			
				$connection = mysqli_connect('us-cdbr-iron-east-02.cleardb.net', 'b77cd357d78c16', 'd98eba5a', 'heroku_034f5952d66454c');
				$query = "Select * from " . $_SESSION['username'] . " limit " . $_SESSION['list'];
				$result = mysqli_query($connection, $query);
			
				while($current = mysqli_fetch_assoc($result)){
					echo '<form action="home.php" method="POST" style="background-color:white; border-radius: 20px; padding:10px;" onclick="func(event, this)">';
						echo "<p id='id' style='display:none'>";
							print_r($current['id']);
						echo '</p>';
						echo '<p>From: ';
							print_r($current['user']);
						echo '</p>';
						echo '<p>Subject: ';
							print_r($current['subject']);
						echo '</p>';
						echo '<input type="submit" name="delete" value="X" style="border-radius:20px;" >';
						echo '<input style="display:none;" type="text" name="id" value=' . $current["id"] . '>'; //'<input onclick="delet(event)" class="button" type="submit" name="submit" value="x">';
					echo '</form>';
					echo '<br>';
				}
				
			?>
			<button class='button rnd-btn' onclick='loadMore()'>+</button>
		</div>
		
	</div>
				
		<script>
			function func(e, t){
				if(!e.target.type){
					location.href = "mail.php?q=" + t.querySelector('#id').innerHTML;
				}
			}
			
			function loadMore(){
				let load = '';
				
				for(let i = location.href.indexOf("l=") + 2; i < location.href.length; i++){
					if(isNaN(location.href[i])){
						break;
					}
					load = load + location.href[i]
				}
				location.href = "home.php?l=" + String(Number(load) + 5);
			}
		</script>
		
	</body>
</html>

<!-- jennifer ferris -->








