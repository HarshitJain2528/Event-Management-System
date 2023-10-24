<?php session_start();
	include('common/connection.php');

	$eventID = $_GET['event'];
	$query = "select ename, edate, elocation,eprice from addevent where id = $eventID";
	$result = mysqli_query($connect, $query);
	$event = mysqli_fetch_assoc($result);
	
	$name = $event['ename'];
	$date = $event['edate'];
	$location = $event['elocation'];
	$price=$event['eprice'];

	$totalAmount = $_GET['amount'] ?? "Not Available";
	$apiKey="rzp_test_wL8k6vC86lxEAV";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Payment- EventSpectra</title>
		<link rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
		<!-- header starts here-->
		<?php include("common/header.php"); ?>
		<!-- header ends here-->
		<!-- total amount container starts here-->
		<div class="totalamount">
			<h2>Total Amount</h2>
			<div class="totalamount-details">
				<p>Name: <?php echo $name; ?></p>
				<p>Date: <?php echo $date; ?></p>
				<p>Location: <?php echo $location; ?></p>			
				<?php
					$query="select * from registration";
					$result=mysqli_query($connect,$query);
					$row=mysqli_fetch_assoc($result);
					?>		
					<form action="thank.php" method="POST">
						<script
							src="https://checkout.razorpay.com/v1/checkout.js"
							data-key="<?php echo $apiKey; ?>" 
							data-amount="<?php echo $_GET['amount'] * 100 ; ?>" 
							data-currency="INR"
							data-id="<?php echo $row['id'];?>"
							data-buttontext="Pay: <?php echo $_GET['amount'];?>"
							data-name="Event Spectra"
							data-prefill.name="<?php echo $row['name'];?>"
							data-prefill.email="<?php echo $row['email'];?>"
							data-prefill.contact="<?php echo $row['phone'];?>"
							data-theme.color="#F37254"
						></script>
						<input type="hidden" custom="Hidden Element" name="hidden"/>					
					</form>
					<?php
				?>
			</div>
		</div>
		<!-- total amount container ends here-->
		<!-- footer starts here-->
		<?php include("common/footer.php"); ?>
		<!-- footer ends here-->
	</body>
</html>