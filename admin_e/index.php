<?php session_start();
	include("common/connection.php");
	if(!empty($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from login where username='$username' and password='$password'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$_SESSION['uname']="set";
			header('location:addevent.php');
		}
		else
		{
			?>
				<script>
					alert("Login Failed");
				</script>
			<?php
		}
	}
	if(!empty($_GET['log']))
	{
		session_destroy();
	}
?>

<html>
    <head>
        <title>Admin Login Page</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <!--main container starts here-->
		<div class="maincontainer">
			<!--inner container starts here-->
			<div class="innercontainer">
				<h1>Event Management System</h1>
			</div>
			<!--inner container ends here-->
		</div>
		<!--main container ends here-->
        <!--login container starts here-->
        <div class="login-container">
			<h2>Login</h2>
			<form class="login-form" method="POST">
				<div class="form-group">
					<input type="text" id="username" name="username" placeholder="Enter Username"required>
				</div>
				<div class="form-group">
					<input type="password" id="password" name="password" placeholder="Enter Password"required>
				</div>
				<input type="submit" class="login-button" value="Login" name="login"/>
			</form>
		</div>
		<!--login container ends here-->
    </body>
</html>