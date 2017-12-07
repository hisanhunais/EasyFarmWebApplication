<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	        <style>
            div.scroll {
    
                width: 900px;
                height: 400px;
                overflow: scroll;
            }

        </style>
	<!--<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/homepage.css" rel="stylesheet">
	<script src="../../js/bootstrap.min.js"></script>-->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>
<body>

	


	<?php
		include('../../controller/connect.php');
		$sql="SELECT * FROM login WHERE type='Farmer'";

		$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	?>	

		<div class=scroll>
		<table class="table table-bordered">
	 					<tr>
                                  <td width="20%"><b>Username</b></td>
                                  <td width="20%"><b>First Name</b></td>
                                  <td width="20%"><b>Last Name</b></td>
                                  <td width="20%"><b>Contact No</b></td>
                                   <td width="10%"></td>
                                  <td width="10%"></td>
						</tr>	
		<?php 
			while($row=mysqli_fetch_row($res))
			{
		?>
                             <tr>
                               <td width="20%"><?php echo $row[0]; ?></td>
                                 <td width="20%"><?php echo $row[1]; ?></td>
                                 <td width="20%"><?php echo $row[2]; ?></td>
                                <td width="20%"><?php echo $row[3]; ?><!--<img src="<?php #echo $imgsrc; ?>" width="50" height="35" class="img-thumbnail" alt="image">--><!-- </td> -->
                               <!-- <td width="10%"><input type="button" name="edit" value="Edit" id="<?php #echo $row[0]; ?>" class="btn btn-info btn-sm edit_data" ></td> -->
                               <td width="10%"><button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row[0]; ?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button></td>
                                <!-- <td width="10%"><input type="button" name="delete" value="Delete" id="<?php #echo $row[0]; ?>" class="btn btn-danger btn-sm delete_data" ></td> -->
                                <td width="10%"> <a data-toggle="modal" data-id="<?php echo $row[0]; ?>" href="#delete" class="btn btn-danger btn-sm view-admin">Delete</a></td>
                              </tr>		
		<?php 

			}
		?>
		</table>
	</div>


<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog"> 
      <div class="modal-content"> 
                  
         <div class="modal-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i> Farmer Profile
             </h4> 
         </div> 
         
         <div class="modal-body"> 
                       
             <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="ajax-loader.gif"> 
             </div>
                       
             <div id="dynamic-content"> <!-- mysql data will load in table -->
                                        
                 <div class="row"> 
                     <div class="col-md-12"> 
                        
                     <div class="table-responsive">
                             
                     <table class="table table-striped table-bordered">
                     <tr>
                     <th>First Name</th>
                     <td id="txt_fname"></td>
                     </tr>
                                     
                     <tr>
                     <th>Last Name</th>
                     <td id="txt_lname"></td>
                     </tr>
                                         
                     <tr>
                     <th>Email ID</th>
                     <td id="txt_email"></td>
                     </tr>
                                         
                     <tr>
                     <th>Position</th>
                     <td id="txt_position"></td>
                     </tr>
                                         
                     <tr>
                     <th>Office</th>
                     <td id="txt_office"></td>
                     </tr>
                                         
                     </table>
                                
                     </div>
                                       
                   </div> 
              </div>
                       
             </div> 
                             
         </div> 
           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
       </div>  
              
      </div> 
   </div>
</div>
<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="delete_stock_form">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Item</h4>
        </div>
        <div class="modal-body">

          <p>Are you sure you want to delete the user called</p>
          <b><p id="showid"> ?</p></b>
          <input type="hidden" name="deletedata" id="deletedata">
        </div>
        <div class="modal-footer">
         <input type='button'  name='delete' value='Delete'  class='btn btn-danger btn-sm delete_data' > 
          <!-- <button type="submit"  class="btn main-color-bg" id = "showid" name="delete" >Delete</button>  -->
          <!-- <a class="btn main-color-bg" href="func_announcement.php?An_ID=<?php #echo urlencode($An_ID); ?>"><i class="icon-trash icon-white"></i> Delete</a> -->
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>  
</body>
</html>

<script type="text/javascript">


$(document).ready(function(){

  $(document).on("click", ".view-admin", function() {
    var adminid = $(this).data('id');
    $(".modal-body #showid").text(adminid);
    $('#delete').modal('show');
});
 
 $(document).on('click', '#getUser', function(e){
  
  e.preventDefault();
  
  var uid = $(this).data('id'); // get id of clicked row
  
  $('#dynamic-content').hide(); // hide dive for loader
  $('#modal-loader').show();  // load ajax loader
  
  $.ajax({
      url: 'getuser.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'json'
  })
  .done(function(data){
      console.log(data);
      $('#dynamic-content').hide(); // hide dynamic div
      $('#dynamic-content').show(); // show dynamic div
      $('#txt_fname').html(data.firstName);
      $('#txt_lname').html(data.lastName);
      $('#txt_email').html(data.addressNo);
      $('#txt_position').html(data.addressStreet);
      $('#txt_office').html(data.addressCity);
      $('#modal-loader').hide();    // hide ajax loader
  })
  .fail(function(){
      $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');

</script>




