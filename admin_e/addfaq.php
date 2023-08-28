<?php session_start();
	include("common/connection.php");
	if(!empty($_POST['save']))
	{
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		$query="insert into faq(question,answer) values('$question','$answer')";
		if(mysqli_query($connect,$query))
		{
			?>
				<script>
					alert("faq Inserted");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("faq Not Inserted");
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
        <title>FAQ?</title>
        <link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
        <?php
			include("common/header.php");
		?>
		<!-- main container2 starts here -->
		<div class="maincontainer2">
			<div class="up">
				<h3>Total Categories</h3>
			</div>
			<?php 
				include("common/leftlist.php");
			?>
			<div class="right">
				<div class="right2">
					<p>FAQ?</p>
					<form method="post">
						<table class="table">
							<tr>
								<td>Question</td>
								<td><input type="text" name="question" /></td>
							</tr>
							<tr>
								<td>Answer</td>
								<td><input type="text" name="answer" /></td>
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