<?php session_start();
	include('common/connection.php');
	if (!empty($_GET['event']))
	{
		$eventID = $_GET['event'];
		$query = "select * from addevent where id = $eventID";
		$result = mysqli_query($connect, $query);
		$event = mysqli_fetch_assoc($result);
	}
	
?>
<html>
	<head>
		<title>Event Details - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		<?php
			if(!empty($event))
			{
				?>
					<div class="event-details">
						<div class="eventimage">
							<img src="admin_e/uploadimages/<?php echo $event['eimage']?>" alt="Image Not Found"/>
						</div>
						<div class="event-info">
							<h2><?php echo $event['ename']?></h2>
							<p>Date: <?php echo $event['edate']?></p>
							<p>Location:<?php echo $event['elocation']?></p>
							<p>Price: Rs.<?php echo $event['eprice']?></p>
							<p>Available Seats:<?php echo $event['seats']?></p>
							<?php
								if (isset($_SESSION['uname'])) 
								{	
									?>
										<a href="registration.php?event=<?php echo $event['id'] ?>" class="btn-primary">Register Now</a>
									<?php
								} 
								else 
								{
									?>
										<a href="login.php" class="btn-primary">Login to Register</a>
									<?php
								}
							?>
						</div>
					</div>
				<?php			
			}
		?>
		<!-- ... Footer content here ... -->
		<?php
			include("common/footer.php");
		?>
	</body>
</html>
