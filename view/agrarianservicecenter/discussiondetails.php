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
                <div class="list-group">
					  <a href="agrarianhome.php" class="list-group-item ">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
					  </a>

					  <a href="agrariancreatepro.php" class="list-group-item"><span class="glyphicon glyphicon-grain" aria-hidden="true"></span> Create Farmer Profiles</a>
					  <a href="agrarianmeeting.php" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Meetings</a>
					  <a href="agrariandiscussion.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Discussion <span class="badge">12</span></a>
					  <a href="agrarianannouncement.php" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Posts</a>
					  <a href="agrarianreport.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
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
																<?php
										require '../../dbconfig/config.php';
									?>	
									<?php
									$forumid = $_GET['id'];
									$forumID = $_GET['id'];
									$sql="SELECT * FROM discussionforum WHERE Forum_ID = '$forumID'";
									$date = "";
									$time = "";
									$username = "";
									$category = "";
									$topic = "";
									$post = "";
									$res=mysqli_query($con,$sql) or die(mysqli_error($con));
				
									if($res)
									{
										while($row=mysqli_fetch_row($res))
										{
											$username = $row[1];
											$date = $row[2];
											$time = $row[3];
											$category = $row[4];
											$topic = $row[5];
											$post = $row[6];
										}
									}
									
		
									echo	"
											<br>

											
											
											<p><pre>Category : $category</pre></p>
											<br>
											<p>Topic 	: $topic</p>
											<br>
											<p>Post 	: $post</p>
											<br>
											
											";
									echo" <p class='pull-right'>Date : $date<br>Time: $time</p>";
											
									
			/*		
			$sql = "SELECT * FROM order_details WHERE order_No = $ordNo";
			$res=mysqli_query($con,$sql)
                or die(mysqli_error($con));
			
					

			if ($res){
				while($row=mysqli_fetch_row($res)){
					echo "<div class='tbl'>";

					//echo "<table border=0>
					echo   "<tr>
							<td>$row[2]</td>
							<td>$row[3]</td>
							</tr>";
							
					
					

					echo "</div>";
				}
				echo"</table>";
				echo "</div>";
				echo "</div>";
			}else{
				echo "error".mysql_error();
			}*/
	?>
	 <left><a href="agrariandiscussion.php"><button type="button" class="btn btn-default" name="btncancel">Back</button></a></left>
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
