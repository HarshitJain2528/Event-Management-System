<?php session_start();
	include("common/connection.php");
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from addevent where id=$id";
		if(mysqli_query($connect,$query))
		{
			?>
				<script>
					alert("Record Deleted");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
					alert("Record Not Deleted");
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
        <title>Events</title>
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
				<h3>Total Events</h3>
			</div>
			<?php 
				include("common/leftlist.php");
			?>
			<div class="right">
				<div class="right2">
					<p>Events</p>
					<form>
						<table class="eventtable" border="1" width="550" style="font-size:14px;">
							<tr>
								<th>Id</th>
								<th>Event Name</th>
								<th>Date</th>
								<th>Venue</th>
								<th>Delete</th>
							</tr>
							<?php
								$query="select * from addevent";
								$limit=4;
								if(empty($_GET['a']))
								{
									$start=0;
								}
								else
								{
									$ai=$_GET['a'];
									$end=$ai*$limit;
									$start=$end-$limit;
								}
								$query="select * from addevent limit $start,$limit";
								$result=mysqli_query($connect,$query);
								while($row=mysqli_fetch_assoc($result))
								{
									?>
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['ename'];?></td>
											<td><?php echo $row['edate'];?></td>
											<td><?php echo $row['elocation'];?></td>
											<td align="center"><a href="totalevents.php?did=<?php echo $row['id']?>" style="color:black;"><i class="fas fa-trash"></i></a></td>
										</tr>
									<?php
								}
							?>
								<tr>
									<td colspan="10" align="left">
										<?php
											$query="select * from addevent";
											$result=mysqli_query($connect,$query);
											$count=mysqli_num_rows($result);
											$pages=ceil($count/$limit);
											for($i=1;$i<=$pages;$i++)
											{
												?>
													<a href="totalevents.php?a=<?php echo $i;?>" style="color:black; text-decoration:none;"><?php echo $i;?></a>
												<?php
											}
										?>
									</td>
								</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!--main container2 ends here-->
	</body>
</html>