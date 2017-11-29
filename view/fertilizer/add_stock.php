<?php
	require '../../controller/connect.php';

	if(!empty($_POST))
	{
		$output = '';
		$name = mysqli__real_escape_string($conn,$_POST['item_name']);
		$qty = mysqli__real_escape_string($conn,$_POST['item_qty']);
		$price = mysqli__real_escape_string($conn,$_POST['item_price']);
		$date1 = new DateTime("now", new DateTimeZone('Asia/Colombo') );
		$date = $date1->format('Y-m-d');
		$username = "AmalPerera";

		$query = "INSERT INTO fertilizer VALUES('','$name','$price','$qty','$date','$username')";

		if(mysqli_query($conn,$query))
		{
			$output = "<label class='text-success'>Data Inserted</label>";
			$select_query = "SELECT * FROM fertilizer";
			$result = mysqli_query($conn,$result);
			$output .= '
				
			';
		}
	}
?>