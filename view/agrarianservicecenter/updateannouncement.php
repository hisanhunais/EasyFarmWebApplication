



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
				<li class="active">Agrarian Service Center Profile</li>
			</ol>
		</div>
	</section>
	
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
					  <a href="agrariandiscussion.php" class="list-group-item"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Discussion <span class="badge">12</span></a>
					  <a href="agrarianannouncement.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Posts</a>
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
							 <div class="container">
      
          <div class="modal-dialog" role="document">
          <div class="modal-content">
                                      <div class="modal-header">
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                        <h4 class="modal-title" id="addLabel"><center>Update Posts</center></h4>
                                      </div>
                                      <form action="updateannouncement.php" method="POST">
                                      <div class="modal-body">
                                        
                                          <div class="form-group">
                                            <label for="id">Post ID </label>
                                            <input type="label" name="id" class="form-control"  id="id" value=<?php echo isset($_GET['id']) ? $_GET['id'] : '';?>>
                                          </div>
                                          <div class="form-group">
                                  
                                    
                                  
                                  <label>Date</label>
                                    <input type="label" name="date" class="form-control" placeholder="date" id="date" >
                                </div>
                                <div class="form-group">
                                  <label >Time</label>
                                  <input type="label" name="time" class="form-control" placeholder="time" id="time" >
                                </div>
                                <div class="form-group">
                                  <label >Category</label>
                                  <input type="label" name="category" class="form-control" placeholder="category" id="category" >
                                </div>
                                <div class="form-group">
                                  <label >Topic</label>
                                  <input type="label" name="topic" class="form-control" placeholder="topic" id="topic" >
                                </div>
                                 <div class="form-group">
                                  <label >Description</label>
                                  <input type="label" name="des" class="form-control" placeholder="des" id="des" >
                                </div>
                                          </div>
                                          <button type="submit"   "<?php include ('../../controller/func_announcement.php'); echo updatepost();?>" class="btn btn-default" name="updatepost" class="btn-primary">Submit</button>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        
                                      </div>
                                      </form>
                                    </div>                          
          </div>	
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
