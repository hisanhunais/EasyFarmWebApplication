<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Fertilizer Seller</title>

    <!-- Bootstrap core CSS -->
   <!-- <link href="../../css/bootstrap.min.css" rel="stylesheet">-->
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!--<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>
	
	<?php include 'header.php'; ?>
	
	<section id="main">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-3">
	                <?php include 'sidebar.php'; ?>
	            </div>
				<div class="col-md-9">
					<div class="panel panel-default">
						<!--<div class="panel-heading main-color-bg">
							<h3 class="panel-title main-color-bg">Stock</h3>
						 </div>-->
						<div class="panel-body">
							<div class="row">
								<div class = "col-md-12" id="loadSection">
									<div class="table-responsive">
										<button type="button" class="btn btn-md main-color-bg" data-toggle="modal" data-target="#addStock">
											<span class="glyphicon glyphicon-plus-sign"> Add
										</button>
										<br><br>
										<table class="table table-bordered" id="stock_table">
											<thead>
												<tr>
													<td width="20%"><b>Name</b></td>
													<td width="20%"><b>Price (Rs)</b></td>
													<td width="20%"><b>Quantity (kg)</b></td>
													<td width="20%"><b>Image</b></td>
													<td width="10%"></td>
													<td width="10%"></td>
												</tr>
											</thead>
											<tbody>
												<?php
													include 'get_fertilizer_items.php';
												?>
              								</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
	        </div>
	    </div>
	</section>

<?php include 'footer.php'; ?>

<div id="addStock" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="add_stock_form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Item</h4>
				</div>
				<div class="modal-body">
					<label>Item Name</label>
					<input type="text" name="item_name" id="item_name" class="form-control" required="" />
					<br>
					<label>Quantity</label>
					<input type="number" name="item_qty" id="item_qty" class="form-control" required="" />
					<br>
					<label>Price</label>
					<input type="number" name="item_price" id="item_price" class="form-control" required="" />
					<br>
					<!--<label>Image</label>
					<input type="file" name="file_name" id="item_image" />-->
				</div>
				<div class="modal-footer">
					<input type="submit" name="submit" value="Submit" class="btn main-color-bg" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>	
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js"></script>-->
    <!--<script src="../../js/jquery.js"></script>-->
  </body>
</html>

<script>
	$(document).ready(function(){
		$('#add_stock_form').on('submit',function(){
			$.ajax({
				url:"add_stock.php",
				method:"POST",
				data:$('#add_stock_form').serialize(),
				success:function(data)
				{
					$('#add_stock_form')[0].reset();
					$('#addStock').modal('hide');
					$('#stock_table').html(data);
				}
			});
		});
	});
</script>

