<?php session_start();
	include("common/connection.php");
	if(!empty($_POST['add']))
	{
		$ename=$_POST['eventname'];
		$edate=$_POST['date'];
		$evenue=$_POST['venue'];
		$eprice=$_POST['price'];
		$seats=$_POST['seats'];
		$eimage=$_FILES['eimage']['name'];
		$etemppath=$_FILES['eimage']['tmp_name'];
		$currtime=round(microtime(true) * 1000);
		$extarr=explode(".",$eimage);
		$ext=$extarr[1];
		$fullfilename=$currtime.".".$ext;
		$query="insert into addevent(ename, edate, elocation, eprice, seats, eimage) values('$ename','$edate','$evenue','$eprice','$seats','$fullfilename')";
		if(mysqli_query($connect,$query))
		{
			move_uploaded_file($etemppath,"uploadimages/".$fullfilename);
			?>
				<script>
					alert("Event Inserted");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("Event Not Inserted");
				</script>
			<?php	
		}
	}
	if(empty($_SESSION['uname']))
	{
		header('location:index.php');
	}
?>
<html>
    <head>
        <title>Add Event</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
		<?php
			include("common/header.php");
		?>
		<!-- main container2 starts here -->
		<div class="maincontainer2">
			<div class="up">
				<h3>Add Events</h3>
			</div>
			<?php 
				include("common/leftlist.php");
			?>
			<div class="right">
				<div class="right2">
					<p>Add Event</p>
					<form method="post" enctype="multipart/form-data">
						<table class="table">
							<tr>
								<td>Event Name:</td>
								<td><input type="text" name="eventname" /></td>
							</tr>
							<tr>
								<td>Event Date:</td>
								<td><input type="date" name="date" /></td>
							</tr>
							<tr>
								<td>Event Venue:</td>
								<td><input type="text" name="venue" /></td>
							</tr>
							<tr>
								<td>Event Price:</td>
								<td><input type="text" name="price" /></td>
							</tr>
							<tr>
								<td>Total Seats:</td>
								<td><input type="text" name="seats" /></td>
							</tr>
							<tr>
								<td>Event Image:</td>
								<td><input type="file" name="eimage" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Add Event" name="add"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!-- main container2 ends here -->
	</body>
</html>