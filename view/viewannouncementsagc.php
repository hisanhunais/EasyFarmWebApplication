<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
</head>
<body>
	<?php

			require("../controller/connect.php");

			$sql="SELECT * FROM announcement ORDER BY Date DESC" ; 

			$res=Mysqli_query($conn,$sql);
			echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							<td width='100px'>Announcement ID</td>
							<td width='100px'>Date</td>
							<td width='150px'>Announcement type</td>
							<td width='150px'>Title</td>
							<td width='250px'>Description</td>
							</tr>
						</table>
					";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";
					echo "<table border=0 >
							<tr>
							<td width='150px'>$row[0]</a></td>
							<td width='150px'>$row[1]</a></td>
							<td width='150px'>$row[3]</td>
							<td width='150px'>$row[4]</td>
							<td width='250px'>$row[5]</td
							<td ><a href='../view/uannouncement.php?id=$row[0]'><input type='button' name='update'  value='Update' class='btn btn-primary'></a></td>
							<td ><a href='../model/deleteannouncement.php?id=$row[0]'><input type='button' name='Delete'  value='Delete' class='btn btn-primary'></a></td>							
							</tr>
						</table>
					";
					echo "</div>";
				}
			}else{
				echo "error";
			}

		?>
</body>
</html>
