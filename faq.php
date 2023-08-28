<?php session_start();
	include('common/connection.php');
?>
<html>
	<head>
		<title>FAQ - EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		
		<div class="faq">
			<h2>Frequently Asked Questions</h2>
			<div class="faq-list">
			<?php
				$query="select * from faq";
				$result = mysqli_query($connect, $query);
				$count=mysqli_num_rows($result);
				if($count>0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						?>
							<div class="faq-item">
								<h3><?php echo $row['question']?></h3>
								<p><?php echo $row['answer']?></p>
							</div>
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
