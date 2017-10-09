<?php
	//session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Buyer</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
	<link href="../../css/homepage.css" rel="stylesheet">

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

  

  </head>

  <body>
	<nav class = "navbar navbar-default">
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
				<!--<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>-->
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
				<li class="active">Buyer Profile</li>
			</ol>
		</div>
	</section>
	
	<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="home.php" id="homeBtn" class="list-group-item">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
                    </a>
                    <a href="harvest.php" id="harvestBtn" class="list-group-item"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Harvest</a>
                    <a href="paddyOrder.php" id="paddyOrderBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Paddy Orders</a>
                    <a href="fertilizerOrder.php" id="fertilizerOrderBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Fertilizer Orders</a>
                    <a href="transport.php" id="transportBtn" class="list-group-item"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Transport</a>
                    <a href="announcement.php" id="announcementBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Announcements</a>
                    <a href="discussionForum.php" id="discussionBtn" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Discussion Forum</a>
                    <a href="report.php" id="reportBtn" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
                </div>
            </div>
			<div class="col-md-9">
					<div class="panel panel-default">
					  <!--<div class="panel-heading main-color-bg">
						<h3 class="panel-title">Home Buyer</h3>
						
					  </div>-->
					  <div class="panel-body">
						<div class="row">
							<div class = "col-md-12" id="loadSection">
								<?php

			require '../../dbconfig/config.php';

			$sql="SELECT * FROM discussionforum ORDER BY Date DESC" ; 

			$res=Mysqli_query($con,$sql);
			echo "<table border=0 class='table table-stripped table-hover'>
							<tr>
							
							<th width='150px'>Date</th>
							<th width='150px'>Category</th>
							<th width='150px'>Topic</th>
							<th width='250px'></th>
							</tr>
						
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
							<td width='250px'><button type='button' class='btn btn-secondary'><a href='discussionDetails.php?id=$row[0]'>View Description</a></button></td>
							
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
</section>



	
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
