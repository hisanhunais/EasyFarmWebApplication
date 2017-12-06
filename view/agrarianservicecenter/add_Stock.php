<?php
	require '../../controller/connect.php';

	if(!empty($_POST))
	{
		$output = '';
		$message = '';

		if(isset($_POST['deletedata']))
		{
			$query = "DELETE FROM announcement An_ID WHERE username = '".$_POST['deletedata']."'";
			$message = "Data Deleted";
		}
		else
		{
		$fname = mysqli_real_escape_string($conn,$_POST['firstname']);
		$lname = mysqli_real_escape_string($conn,$_POST['lastname']);
		$adno = mysqli_real_escape_string($conn,$_POST['addressNo']);
		$street = mysqli_real_escape_string($conn,$_POST['Street']);
		$contactno = mysqli_real_escape_string($conn,$_POST['contactno']);
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
		$city = mysqli_real_escape_string($conn,$_POST['City']);
		$type='Farmer';


		if($_POST['username'] != '')
		{
			// 			$query = "UPDATE login SET username = '$username',  = '$price', Fer_quantity = '$qty' WHERE username = '".$_POST['username']."'";
			// $message = "Data Updated";
				
				
		}
		else
		{
			$query = "INSERT INTO login VALUES('$username','$fname','$lname','$adno','$street','$city','$password','$contactno','$type')";
			$message = "Data Inserted";	
		}
		}

		

	// 	if(mysqli_query($conn,$query))
	// 	{
	// 		$output .= '<label class="text-success">'.$message.'</label>';
	// 		$select_query = "SELECT * FROM login where type='Farmer'";
	// 		$result = mysqli_query($conn,$select_query);
	// 		$output .= '
	// 			<table class="table table-bordered">
	// 					<tr>
 //                                  <td width="20%"><b>Username</b></td>
 //                                  <td width="20%"><b>First Name</b></td>
 //                                  <td width="20%"><b>Last Name (kg)</b></td>
 //                                  <td width="20%"><b>Contact No</b></td>
 //                                  <td width="10%"></td>
 //                                  <td width="10%"></td>
	// 					</tr>
	// 		';
	// 		while($row = mysqli_fetch_row($result))
	// 		{
	// 			$output .= '
 //                              <tr>
 //                                <td width="20%"><?php echo $row[0]; ?></td>
 //                                <td width="20%"><?php echo $row[1]; ?></td>
 //                                <td width="20%"><?php echo $row[2]; ?></td>
 //                                <td width="20%"><?php echo $row[3]; ?><!--<img src="<?php #echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--></td>
 //                                <td width="10%"><input type="button" name="edit" value="Edit" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs edit_data" ></td>
 //                                <td width="10%"><input type="button" name="delete" value="Delete" id="<?php echo $row[0]; ?>" class="btn btn-info btn-xs delete_data" ></td>
 //                              </tr>
	// 			';
	// 		}
	// 		$output .= '</table>';
	// 	}
	// 	echo $output;
	// }
?>