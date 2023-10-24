<?php session_start();
	include('common/connection.php');
?>
<html>
	<head>
		<title>About Us - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>

		<div class="about">
			<div class="about-content">
				<h2>About Us</h2>
		<?php
			$query = "select * from about";
			$result = mysqli_query($connect, $query);
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					?>
						<p><?php echo $row['about']?></p>
					<?php
				}
			}
		?>
		</div>
		</div>
		<!-- ... Footer content here ... -->
		<?php
			include("common/footer.php");
		?>
	</body>
</html>
