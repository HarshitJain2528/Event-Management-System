<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php include("common/header.php"); ?>

    <div class="thank-you-container">
		<div class="thank">
			<h1>Thank You for Your Payment</h1>
			<p>Your payment was successful. We appreciate your business!</p>
			<span>If you have any questions or need further assistance, please feel free to <a href="contact.php">contact us</a>.</span>
			<h2>Stay Connected</h2>
			<ul class="social-icons">
				<li><a href="https://facebook.com"><i class="fab fa-facebook"></i> Facebook</a></li>
				<li><a href="https://twitter.com"><i class="fab fa-twitter"></i> Twitter</a></li>
				<li><a href="https://instagram.com"><i class="fab fa-instagram"></i> Instagram</a></li>
			</ul>
		</div>
	</div>
		<?php include("common/footer.php"); ?>
</body>
</html>
