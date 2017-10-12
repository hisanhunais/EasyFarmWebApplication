<?php
	


	function insertannouncement(){
		include 'connect.php';
		if(isset($_POST['insertannouncement']))
		{
			$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
			$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
			$category = mysqli_real_escape_string($conn, $_REQUEST['category']);
			$toipc = mysqli_real_escape_string($conn, $_REQUEST['topic']);
			$des = mysqli_real_escape_string($conn, $_REQUEST['des']); 
			// attempt insert query execution

			$sql = "INSERT INTO meetings (`Date`,`Time`,`Category`,`Topic`,`Description`) VALUES ('$date','$time','$category','$topic','$des')";
			if(mysqli_query($conn, $sql)){
			    
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}

			header('location: agrarianannouncement.php');
			// Close connection
			mysqli_close($conn);					
		}
	}
	function deleteannouncement(){

		if(isset($_POST['deleteannouncement'])){
			$postid = $_GET['postid'];
			$sql="DELETE FROM `annoucement` WHERE An_ID='$postid'";
			include 'connect.php';
			$res=mysqli_query($conn,$sql);
			  
			  header('location:agrarianannouncement.php');
			  ob_end_flush();
			
		}

	}
	function updateannouncement(){
		if(isset($_POST['updateannouncement'])){
			$postid = $_POST['postid'];
			$date=$_POST['date'];;
			$time=$_POST['time'];;
			$purpose=$_POST['purpose'];;
			$sql="UPDATE `meetings` 
			SET  meetingID = '$meetingid', Date= '$date',Time='$time',Purpose='$purpose'
			WHERE meetingID='$meetingid'";
			include 'connect.php';
			$res=mysqli_query($conn,$sql);
			header('location:agrarianannouncement.php');
		}

	}
	// function updatepaddysinhala(){
	// 	require '../controller/connect.php';
	// 	if(isset($_POST['updatepaddy'])){
	// 		$paddy_id = $_GET['id'];
	// 		$sql="UPDATE FROM `paddy` WHERE Paddy_ID='$paddy_id'";

	// 		$res=mysqli_query($conn,$sql);
	// 		if($res){
	// 			header('location:../view/viewpaddysinhala.php');
	// 		}
	// 	}
	// }


	

?>