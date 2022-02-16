<?php
include 'header.php';
?>




<?php 
	//session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,name,email,address) values ('$user_id','$user_name','$password','$name','$email','$address')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
        border-radius: 5px;

	}

	#box{

		background-color: coral;
		margin: none;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"placeholder="User Name"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
			<input id="text" type="text" name="name" placeholder="Full Name"><br><br>
			<input id="text" type="email" name="email" placeholder="Email" ><br><br>
			<input id="text" type="text" name="address" placeholder="Address"><br><br>

			<input id="button" type="submit" value="Signup"><b><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
<?php
include 'footer.php';
?>
