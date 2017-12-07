<!-- <?Php
   
 #require_once ('../../controller/connect.php');
 
   #if (isset($_POST['id']) && !empty($_POST['id'])) {
      
         #$id = intval($_POST['id']);
         #$query = "SELECT * FROM login WHERE username=:id";
         #$stmt = $DBcon->prepare( $query ); 
         #$stmt->execute(array(':id'=>$id));
         #$row=$stmt->fetch(PDO::FETCH_ASSOC);       
         #echo json_encode($row);
         #exit; 
     }
   
 
 ?> -->

 <?php
 header('Content-type: application/json; charset=UTF-8');
	require_once'../../controller/connect.php';

	if(isset($_POST['id']) && !empty($_POST['id']))
	{
		$query = "SELECT firstName,lastName,addressNo,addressStreet,addressCity FROM login WHERE username = '".$_POST['id']."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}
?>   
