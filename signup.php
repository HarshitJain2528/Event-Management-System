<?php session_start();
	include('common/connection.php');
	if(!empty($_POST['submit']))
	{
		$uname=$_POST['un'];
		$email=$_POST['em'];
		$password=$_POST['ps'];
		$query="select * from signup where email='$email'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			?>
				<script>
					alert('Email already registered! Please enter different email');
				</script>
			<?php
		}
		else
		{
			$query="insert into signup(username,email,password) values('$uname','$email','$password')";
			if(mysqli_query($connect,$query))
			{
				header("location:login.php");
			}
			else
			{
				?>
					<script>
						alert('Record Not Inserted');
					</script>
				<?php
			}
		}
	}
?>
<html>
	<head>
		<title>About Us - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		<div class="maincontainer2">
			<div class="login-container">
				<h2>Sign Up</h2>
				<form class="login-form" method="POST">
					<div class="form-group">
						<input type="text" name="un" placeholder="Enter Username"required>
					</div>
					<div class="form-group">
						<input type="email" name="em" placeholder="Enter Email"required>
					</div>
					<div class="form-group">
						<input type="password" name="ps" placeholder="Enter Password"required>
					</div>
					<a href="category.html"><input type="submit" class="login-button"value="Sign Up" name="submit"/></a>
				</form>
			</div>
		</div>
		<?php
			include("common/footer.php");
		?>
	</body>
</html>