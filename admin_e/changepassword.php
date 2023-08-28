<?php session_start();
	include("common/connection.php");
	if(!empty($_POST['save']))
	{
		$op=$_POST['oldp'];
		$np=$_POST['newp'];
		$cnp=$_POST['confirmp'];
		if($np==$cnp)
		{
			$query="select * from login where password='$op'";
			$result=mysqli_query($connect,$query);
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				$query="update login set password='$np'";
				mysqli_query($connect,$query);
				?>
					<script>
						alert("Password updated successfully");
					</script>
				<?php
			}
			else
			{
				?>
					<script>
						alert("Old Password does not match");
					</script>
				<?php
			}			
		}
		else
		{
			?>
				<script>
					alert("New Password and Confirm New Password does not match");
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
        <title>Change Password</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php
			include("common/header.php");
		?>
		<!-- main container2 starts here -->
		<div class="maincontainer2">
			<div class="up">
				<h3>Change Password</h3>how 
			</div>
			<?php 
				include("common/leftlist.php");
			?>
			<div class="right">
				<div class="right2">
					<p>Change Password</p>
					<form method="post">
						<table class="table">
							<tr>
								<td>Enter Old Password</td>
								<td><input type="password" name="oldp" /></td>
							</tr>
							<tr>
								<td>Enter New Password</td>
								<td><input type="password" name="newp" /></td>
							</tr>
							<tr>
								<td>Confirm New Password</td>
								<td><input type="password" name="confirmp" /></td>
							</tr>
							<tr>
								<td><input type="submit" value="Save Password" name="save"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!--main container2 ends here-->
	</body>
</html>