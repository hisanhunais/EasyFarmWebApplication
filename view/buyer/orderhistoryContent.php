<?php
	require '../../dbconfig/config.php';
?>

<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="../../css/modal_image.css">-->

	<script type="text/javascript">
	function PreviewImage()
	{
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("imgLink").files[0]);
		oFReader.onload = function(oFREvent)
		{
			document.getElementById("uploadPreview").src = oFREvent.target.result;
		};
	};
</script>
</head>
<body>

<?php
	$sql1="SELECT * FROM ordertable WHERE buyer_username = 'Nimal' AND status = 'Pending' ORDER BY ord_Date DESC";
	$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));

	$sql2="SELECT * FROM ordertable WHERE buyer_username = 'Nimal' AND status = 'Dispatched' ORDER BY ord_Date DESC";
	$res2=mysqli_query($con,$sql2) or die(mysqli_error($con));

	$sql3="SELECT * FROM ordertable WHERE buyer_username = 'Nimal' AND status = 'Completed' ORDER BY ord_Date DESC";
	$res3=mysqli_query($con,$sql3) or die(mysqli_error($con));
?>
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
	  <li><a data-toggle="tab" href="#dispatched">Dispatched</a></li>
	  <li><a data-toggle="tab" href="#completed">Completed</a></li>
	</ul>

	<div class="tab-content">
		<br>
	  <div id="pending" class="tab-pane fade in active">
	  	<table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Buyer</th>
			<th>Delivery Required</th>
			<th>Advance Receipt</th>
			<th></th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res1))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td class="receipt" id="<?php echo $row[10]; ?>" onclick="openimage()"><a href="#"><?php echo $row[10]; ?></a></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td>
				<td>
		<?php
			if($row[10] != "None")
			{
		?>
				<input type="button" name="attachview" value="Attach Receipt" id="<?php echo $row[0]; ?>" class="attach_receipt btn btn-info btn-xs" />
		<?php
			}
		?>  
				</td>
			</tr>		
		<?php 
			}
		?>
		</table>  
	  </div>
	  <div id="dispatched" class="tab-pane fade">
	    <table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Buyer</th>
			<th>Status</th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res2))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
			</tr>		
		<?php 
			}
		?>
		</table>
	  </div>
	  <div id="completed" class="tab-pane fade">
	    <table class ="table table-striped table-hover">
		<tr>
			<th>Order Number</th>
			<th>Date</th>
			<th>Total</th>
			<th>Buyer</th>
			<th>Status</th>
			<th></th>
		</tr>	
		<?php 
			while($row=mysqli_fetch_row($res3))
			{
		?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></a></td>
				<td><?php echo $row[2]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><input type="button" name="view" value="View Details" id="<?php echo $row[0]; ?>" class="view_details btn btn-info btn-xs" /></td> 
			</tr>		
		<?php 
			}
		?>
		</table>
	  </div>
	</div>	

	
</body>
</html>

<div id="dataModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background: #333333; color: #ffffff;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Order Details</h4>
			</div>
			<div class="modal-body" id="order_details">
		
			</div>
			<div class="modal-footer" style="background: #333333; color: #ffffff;">
				<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="attachReceipt" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="attach_receipt_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Attach Receipt</h4>
				</div>
				<div class="modal-body">
					<center>
					<input type="file" id="imgLink" name="imgLink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();">
					<br>
					
					<div>
						<img id="uploadPreview" src="http://placehold.it/500x300" alt="" width="500px" height="300px">
						<input type="hidden" name="attachdata" id="attachdata">
					</div>
					</center>
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Submit" id="submitReceipt" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div id="myModal" class="modal imgModal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
</div>

<script>
	$(document).ready(function(){
		$('#update_status').on('submit',function(){
			//alert("hi");
		});

		$('.view_details').click(function(){
			var orderno = $(this).attr("id");

			$.ajax({
				url:"getOrderDetails.php",
				method:"post",
				data:{orderno:orderno},
				success:function(data){
					$('#order_details').html(data);
					$('#dataModal').modal("show");
				}
			});	
		});

		$(document).on('click', '.complete_order', function(){
			var com_ordID = $(this).attr("id");
			$('#completedata').val(com_ordID);
			$('#completeOrder').modal('show');
		});

		$('#complete_order_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"processOrder.php",
				method:"POST",
				data:$('#complete_order_form').serialize(),
				success:function(data)
				{
					$('#complete_order_form')[0].reset();
					$('#completeOrder').modal('hide');
					$('#pending').html(data);
				}
			});
		});

		$(document).on('click', '.attach_receipt', function(){
			var attach_ordID = $(this).attr("id");
			$('#attachdata').val(attach_ordID);
			$('#attachReceipt').modal('show');
		});

		$('#attach_receipt_form').on('submit',function(event){
			event.preventDefault();
			$.ajax({
				url:"processReceipt.php",
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data)
				{
					$('#attach_receipt_form')[0].reset();
					$('#attachReceipt').modal('hide');
					$('#pending').html(data);
				}
			});
		});

		/*$(document).on('click','.receipt',function(event){
			var img = event.target.id;
			var modal = document.getElementById('myModal');	
			var modalImg = document.getElementById("img01");
			modal.style.display = "block";
	    	modalImg.src = img;
		});*/
	});

	// Get the modal
//var modal = document.getElementById('myModal');
//var img =  $(".receipt").attr("id");
// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById('myImg');
//var modalImg = document.getElementById("img01");
//img.onclick = function(){
//    modal.style.display = "block";
//    modalImg.src = this.id;
//}


</script>



<script type="text/javascript">
	function openimage()
	{
		var modal = document.getElementById('myModal');
		var img =  $(".receipt").attr("id");	
		var modalImg = document.getElementById("img01");
		modal.style.display = "block";
    	modalImg.src = img;

	}

	// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>