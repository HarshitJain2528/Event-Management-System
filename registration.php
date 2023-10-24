<?php session_start();
	include('common/connection.php');
	$eventID = $_GET['event'];
	$query = "select ename from addevent where id = $eventID";
	$result = mysqli_query($connect, $query);
	$event = mysqli_fetch_assoc($result);
	if (isset($event)) 
	{
		$eventName = $event['ename'];
	} 
	else 
	{
		$eventName = 'Event';
	}
	
	if(isset($_POST['register']))
	{
		$eventid=$_POST['event_id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$attendees=$_POST['attendees'];
		$query = "select eprice from addevent where id = $eventid";
		$result = mysqli_query($connect, $query);
		$eventPriceRow = mysqli_fetch_assoc($result);
		$eventPrice = $eventPriceRow['eprice'];
		$totalAmount = $eventPrice * $attendees;

		if($attendees>0)
		{
			$query="update addevent set seats=seats-$attendees where id='$eventid'";
			if(mysqli_query($connect, $query))
			{
				header("Location: payment.php?event=$eventid");
			}
			else
			{
				?>
					<script>
						alert("Not Registered");
					</script>
				<?php
			}
		}
		$query = "insert into registration(event_id, name, email, phone, attendees) values('$eventid','$name','$email','$phone','$attendees')";
		if(mysqli_query($connect,$query))
		{
			header("Location: payment.php?event=$eventid&amount=$totalAmount");
		}
		else
		{
			?>
				<script>
					alert("Not Registered");
				</script>
			<?php
		}
	}	
?>
<html>
	<head>
		<title>Event Registration - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>

		<div class="registration">
			<div class="registration-form">
				<h2>Register for <?php echo $eventName; ?></h2>
				<form method="post">
					<input type="hidden" name="event_id" value="<?php echo $eventID; ?>">
					<span>Name:</span>
					<input type="text" name="name" required>
					<span>Email:</span>
					<input type="email" name="email" required>
					<span>Phone:</span>
					<input type="text" name="phone">
					<span>Number of Attendees:</span>
					<input type="number" name="attendees" min="1" required>
					<button type="submit" name="register" class="btn-primary">Register</button>
				</form>
			</div>
		</div>
		<!-- ... Footer content here ... -->
		<?php
			include("common/footer.php");
		?>
	</body>
</html>
