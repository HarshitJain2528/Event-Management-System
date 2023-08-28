<?php session_start();
	include('common/connection.php');
?>
<html>
	<head>
		<title>Events - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		<form>
			<input type="text" name="search" placeholder="Enter Name" class="search"/>
			<button type="submit" class="search-btn"/>Search</button>
		</form>
		<div class="events">
		<?php
			if(!empty($_GET['search']))
			{
				$search=$_GET['search'];
				$query="select * from addevent where ename like '%$search%'";
			}
			else
			{
				$query = "select * from addevent";
			}
			$result = mysqli_query($connect, $query);
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					?>
					<div class="event-card">
						<div class="event-image">
							<img src="admin_e/uploadimages/<?php echo $row['eimage']?>" alt="Image Not Found" class="eimg">
						</div>
						<h3><?php echo $row['ename']?></h3>
						<p><?php echo $row['edate']?></p>
						<span>Rs.<?php echo $row['eprice']?></span><br>
						<span>Seats: <?php echo $row['seats']?></span><br>
						<a href="event_detail.php?event=<?php echo $row['id']?>" class="btn-secondary">Learn More</a>
					</div>
					<?php
				}
			}
			else
			{
				echo "No Event Found";
			}
		?>
		</div>
		<?php
			include("common/footer.php");
		?>
	</body>
</html>