<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">-->
</head>
<body>
	<?php

			require("../../dbconfig/config.php");
			$category = "";
			$sql="SELECT * FROM announcement ORDER BY Date DESC" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table class='table table-bordered'>
							<tr>
							
							<th width='150px'>Date</th>
							<th width='150px'>Announcement type</th>
							<th width='150px'>Title</th>
							<th width='250px'></th>
							</tr>
						
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
						echo "	<tr>
							<td width='25%'>$row[1]</td>
							<td width='25%'>$row[3]</td>
							<td width='25%'>$row[4]</td>
							<!--<td width='250px'><button type='button' class='btn btn-secondary'><a href='announcementsDetailsScreen.php?id=$row[0]'>View Description</a></button></td>-->
							<td width='25%'><center><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#viewDescription' onclick='getDetails($row[0])'>View Description</button></center></td>
							
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>
		<?php

		function getDetails($an_id)
		{
		$an_id = $_GET['id'];
		$sql="SELECT * FROM announcement WHERE An_ID = '$an_id'";
		$date = "";
		//$category = "";
		$title = "";
		$description = "";
		$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
				if($res)
				{
					while($row=mysqli_fetch_row($res))
					{
						$date = $row[1];
						$category = $row[3];
						$title = $row[4];
						$description = $row[5];
					}
				}
		}
		?>
		<div class = "modal fade" id = "viewDescription"  tabindex="-1" role="dialog" aria-labelledby="addLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Details</h3>
					</div>
					<div class="modal-body">
						<p><?php echo $category; ?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
</body>
</html>