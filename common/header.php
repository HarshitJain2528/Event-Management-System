<?phpif (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- your head content here -->
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo">Event Spectra</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="faq.php">Faq?</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                    <?php
					include('config.php'); 
                    if (isset($_SESSION['uname'])) 
					{
						$username=$_SESSION['uname'];
						?>
							<a href="login.php?log=1">Log Out: <?php echo $username;?></a>
						<?php
                    } 
					elseif (isset($_GET['code'])) 
					{
						$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
						if (isset($token['access_token'])) 
						{
							$client->setAccessToken($token['access_token']);
						
							$google_oauth = new Google_Service_Oauth2($client);
							$google_account_info = $google_oauth->userinfo->get();
							$email =  $google_account_info->email;
							$name =  $google_account_info->name;
							?>
								<a href="login.php?log=1">Log Out</a>
							<?php
						}
						else 
						{
							?>
								<a href="login.php">Log In</a>
							<?php
						}
					}
					else 
					{
						?>
							<a href="login.php">Log In</a>
						<?php
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
