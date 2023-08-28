<?php session_start();

	include("common/connection.php");
	if(!empty($_POST['save']))
	{
		$about=$_POST['about'];
		$query="insert into about(about) values('$about')";
		if(mysqli_query($connect,$query))
		{
			?>
				<script>
					alert("About Us Inserted");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("About Us Not Inserted");
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
        <title>Category</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
		<?php
			include("common/header.php");
		?>
		<!-- main container2 starts here -->
		<div class="maincontainer2">
			<div class="up">
				<h3>Event Category</h3>
			</div>
			<?php 
				include("common/leftlist.php");
			?>
			<div class="right">
				<div class="right2">
					<p>About Us</p>
					<form method="post">
						<table class="table">
							<tr>
								<td align="right">About Us:</td>
								<td><textarea name="about"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Save" name="save"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!--main container2 ends here-->
	</body>
</html>