<?php	session_start();
	include('vendor/autoload.php');
	include('common/connection.php');
	//Regular Login
	if(!empty($_POST['login']))
	{
		$username=$_POST['username'];
		$pass=$_POST['password'];
		$query="select * from signup where username='$username' and password='$pass'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			$_SESSION['uname']=$username;
			header('location:events.php');
		}
		else
		{
			header('location:signup.php');
		}
	}
	if(!empty($_GET['log']))
	{
		session_destroy();
	}
	//google configuration
	$clientID = '618853684118-0eph083ro3b26gi91uagjrc4ouo1e3mn.apps.googleusercontent.com';
	$clientSecret = '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';
	$redirectUri = 'http://localhost/event_management/events.php';

	// create Client Request to access Google API
	$client = new Google_Client();
	$client->setClientId($clientID);
	$client->setClientSecret($clientSecret);
	$client->setRedirectUri($redirectUri);
	$client->addScope("email");
	$client->addScope("profile");

	// authenticate code from Google OAuth Flow
	
	//faceboook authentication
	$fb = new Facebook\Facebook([
	  'app_id' => '6958646657480028',
	  'app_secret' => '83f4a9d533081498b7043c61aa10b286',
	  'default_graph_version' => 'v2.10',
	]);	
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; 
	$loginUrl = $helper->getLoginUrl('http://localhost/event_management/events.php', $permissions);
	
?>
<html>
	<head>
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	</head>
	<body>
		<?php
			include("common/header.php");
		?>
		<!-- main container2 starts here -->
		<div class="maincontainer2">
			<div class="login-container">
				<h2>Login</h2>
				<form class="login-form" method="POST">
					<div class="form-group">
						<input type="text" id="username" name="username" placeholder="Enter Username"required>
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" placeholder="Enter Password"required>
					</div>
					<a><input type="submit" class="login-button" value="Login" name="login"/></a><br><br>
					<p>New user? <a href="signup.php">Sign up first!</a></p><br>
				
					<div class="login-opts">
						<!-- login option start here -->
						<div class="login-opt">
							<a href="<?php echo $client->createAuthUrl(); ?>"><img src="images/google-logo.png" alt="Google Logo" class="gf-icon" name="google">Continue with Google</a>
						</div>
						<div class="login-opt" id="fb-login">
							<a href="<?php echo $loginUrl; ?>"><img src="images/facebook.jpg" alt="Facebook Logo" class="gf-icon">Continue with Facebook</a>
						</div>
						<!-- login option end here -->
					</div>
				</form>
			</div>
		</div>
		<!-- main container2 ends here -->
		<!-- footer starts here-->
		<?php
			include("common/footer.php");
		?>
		<!-- footer ends here -->
	</body>
</html>