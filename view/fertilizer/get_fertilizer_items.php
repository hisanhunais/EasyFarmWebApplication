<?php
require("../../dbconfig/config.php");

$sql = "SELECT * FROM fertilizer";
$rs_result = mysqli_query($con,$sql);

while($row = mysqli_fetch_row($rs_result)) 
{
?>
	<tr>
  	<td width="20%"><?php echo $row[1]; ?></td>
		<td width="20%"><?php echo $row[2]; ?></td>
		<td width="20%"><?php echo $row[3]; ?></td>
		<td width="20%">Image<!--<img src="<?php echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
		<td width="10%">Edit</td>
		<td width="10%">Delete</td>
  </tr>
<?php              								 
}
?>                                