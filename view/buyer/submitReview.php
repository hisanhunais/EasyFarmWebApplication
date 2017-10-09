<?php
		if(isset($_POST['commentBtn']))
		{
			require("../../dbconfig/config.php");
			$id = $_GET['id'];
			$un = $_GET['user'];
			$rating = $_POST['rating'];
			$comment = $_POST['comment'];
			$date = date("Y-m-d");
			$time = date("h:i:sa");
				
			$query = "SELECT reviewID FROM paddyreview";
			$query_run = mysqli_query($con,$query);
			
			$oldno = mysqli_num_rows($query_run);
			$newno = (string)($oldno + 1);
			$prefix = "REV";
			$newid = $prefix.$newno;
			
			$sql5="INSERT INTO paddyreview VALUES('$newid','$id','$un','$date','$time','$comment','$rating')";

			$res5=mysqli_query($con,$sql5);
			header("location:productPage.php?id=$id");
		}
?>