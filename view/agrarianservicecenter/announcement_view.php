
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
	<body>
		<div class="scroll" id ="table">
        	<?php
        	 	require("../../controller/connect.php");
                $category = "";
                $sql="SELECT * FROM announcement ORDER BY Date DESC" ; 

                $res=Mysqli_query($conn,$sql);
                echo "
                <table border=0 class='table table-stripped table-hover'>
                <tr>
                            
                    <th width='150px'>Date</th>
                 	<th width='150px'>Announcement type</th>
                    <th width='150px'>Description</th>
                    <th width='250px'></th>

                </tr>";
                //echo "</table>";

                if ($res){
                	while($row=mysqli_fetch_row($res)){

                	echo "  
                	<tr>

                   		<td width='25%'>$row[1]</td>
                    	<td width='25%'>$row[3]</td>
                    	<td width='25%'>$row[5]</td>

                    	

                      <td width='10%'><input type='button'  name='edit' value='View Description' id='<?php echo $row[0]; ?>' class='btn btn-info btn-sm edit_data' ></td>
                      <td width='10%'><input type='button' data-toggle='modal' data-target='#delete' name='delete' value='Delete' id='<?php echo $row[0]; ?>'' class='btn btn-danger btn-sm delete_data' ></td>
                     

                            
                	</tr>
                        
                	";
                    
                	}
                
                echo "</table>";

                }else{
                    echo "error";
                }

            ?>
                                               
        </div>

        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Announcement</h4>
      </div>
      <div class="modal-body">
        <?php include('updateannouncement.php') ?>

      </div>
<!--       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>

<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="delete_stock_form" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Announcement</h4>
        </div>
        <div class="modal-body">


          <p>Are you sure you want to delete this item?</p>
          <input type="hidden" name="deletedata" id="deletedata">
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn main-color-bg" name="deletepost" onclick="deletepost()?An_ID=<?php echo urlencode($An_ID); ?>">Delete</button> 
          <!-- <a class="btn main-color-bg" href="func_announcement.php?An_ID=<?php echo urlencode($An_ID); ?>"><i class="icon-trash icon-white"></i> Delete</a> -->
          <!-- <input type="submit" name="submit" value="Delete" id="delete" class="btn main-color-bg" /> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>  
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.js"></script>
<?php
function deletepost(){
    require '../../controller/connect.php';
     if(isset($_POST['deletedata'])){
      $_GET['An_ID']=urldecode($_GET['An_ID']);
      $postid = $_GET['An_ID'];
      $sql="DELETE FROM `announcement` WHERE An_ID='$postid'";
     
      $res=mysqli_query($conn,$sql);
        
       header('location:agrarianannouncement.php');
        //ob_end_flush();
      
     }
 
  }
?>
  </body>
</html>

<script>
  $(document).ready(function(){

    $(document).on('click', '.edit_data', function(){
      var An_ID = $(this).attr("id");
      $.ajax({
        url:"fetch_announcement.php",
        method:"POST",
        data:{An_ID:An_ID},
        dataType:"json",
        success:function(data)
        {
          $('#date').val(data.Date);
          $('#time').val(data.Time);
          $('#category').val(data.Category);
          $('#topic').val(data.Topic);
          $('#des').val(data.Description);
          $('#An_ID').val(data.An_ID);
          $('#insertpost').val("Update");
          $('#myModal').modal('show');
        }

      });
    });

    // $(document).on('click', '.delete_data', function(){
    //   var del_fertilizerID = $(this).attr("id");
    //   $('#deletedata').val(del_fertilizerID);
    //   $('#delete').modal('show');
    // });

    // $('#delete_stock_form').on('submit',function(event){
    //   event.preventDefault();
    //   $.ajax({
    //     url:"func_announcement.php",
    //     method:"POST",
    //     data:$('#delete_stock_form').serialize(),
    //     success:function(data)
    //     {
    //       $('#delete_stock_form')[0].reset();
    //       $('#delete').modal('hide');
    //       $('#table').html(data);
    //     }
    //   });
    // });
  });
</script>



