<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Agrarian Service Center</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <style>
div.scroll {
    
    width: 900px;
    height: 400px;
    overflow: scroll;
}

div.hidden {
    background-color: #00FF00;
    width: 900px;
    height: 400px;
    overflow: hidden;
}
</style>
  

  </head>

  <body>
	<!--<nav class = "navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="homefe.php">EasyFarm</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<!<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">WELCOME</a></li>
					<li><a href="index.php">LogOut</a></li>
				</ul>
			</div>
		</div>
	</nav>
	
	<section id="breadcrumb">
		<div class="container-fluid">
			<ol class="breadcrumb">
				<li class="active">Agrarian Service Center Profile</li>
			</ol>
		</div>
	</section>-->
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
						<h3 class="panel-title">Home Buyer</h3>
						
					  </div>-->
					  <div class="panel-body">
						<div class="row">
							<div class = "col-md-12" id="loadSection">
							<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Discussion Forum</h2>
		</div>
		</div>
		</div>
		</div>
		</div>
		<div class=scroll>
			<?php

			require '../../dbconfig/config.php';

			$sql="SELECT * FROM discussionforum ORDER BY Date DESC" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table class='table table-bordered table-striped'>
							<thead>
							<tr>
							
							<th width='150px'>Date</th>
							<th width='150px'>Category</th>
							<th width='150px'>Topic</th>
							<th width='250px'></th>
							</tr>
							</thead>
					";
					//echo "</table>";

			if ($res){
				while($row=mysqli_fetch_row($res)){
					//echo "<div class='tbl'>";
					//echo "<table border=0 >
						echo "	<tr>
							<td width='150px'>$row[2]</td>
							<td width='150px'>$row[4]</td>
							<td width='150px'>$row[5]</td>
							
							<td width='250px'><a href='discussiondetails.php?id=". $row[0] ."' title='View' data-toggle='tooltip' ><button class='btn btn-secondary'><span class=''>View Description</span></button></a></td>
							
							</tr>
						
					";
					
				}
				echo "</div>";
				echo "</table>";
			}else{
				echo "error";
			}

		?>
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

	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
