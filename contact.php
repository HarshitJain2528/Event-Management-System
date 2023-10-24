<?php session_start();
	include('common/connection.php');
	if(isset($_POST['send']))
	{
		$name =  $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$query = "insert into contact (name, email, message) values ('$name', '$email', '$message')";
		if (mysqli_query($connect, $query)) 
		{
			echo "Message sent";
		}
		else 
		{
			echo "Error: ";
		}
	}
?>
<html>
	<head>
		<title>Contact Us - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		<div class="contact">
			<div class="contact-form">
				<h2>Contact Us</h2>
				<form  method="post">
					<span>Name:</span>
					<input type="text" name="name" required>
					<span>Email:</span>
					<input type="email" name="email" required>
					<span>Message:</span>
					<textarea name="message" required></textarea>
					<button type="submit" name="send" class="btn-primary">Send Message</button>
				</form>
			</div>
		</div>
		<!-- ... Footer content here ... -->
		<?php
			include("common/footer.php");
		?>
	</body>
</html>
