<?php session_start();
	include('common/connection.php');
?> 
<html>
	<head>
		<title>EventSpectra - Your Ultimate Event Management Solution</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		<div class="main">
			<div class="main-content">
				<h1>Welcome to Event Spectra</h1>
				<p>Your Ultimate Event Management Solution</p>
				<a href="events.php" class="cta-button">Get Started <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
		<div class="upcoming-events">
			<h2>Upcoming Events</h2>
			<?php
				$query = "select * from addevent order by rand() limit 0,2";
				$result = mysqli_query($connect, $query);
				$count=mysqli_num_rows($result);
				if($count>0)
				{
					while ($row = mysqli_fetch_assoc($result))
					{
						?>
							<div class="event">
								<div class="event-img">
									<img src="admin_e/uploadimages/<?php echo $row['eimage']?>" alt="Image Not Found" class="eimg">
								</div>
								<h3><?php echo $row['ename']?></h3>
								<p><?php echo'Date:'.$row['edate']?></p>
							</div>
						<?php
					} 
				}
				else
				{
					echo '<p>No upcoming events found.</p>';
				}
			?>
		</div>
		<?php
			include("common/footer.php");
		?>
	</body>
</html>
