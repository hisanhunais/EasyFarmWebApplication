
<?php 
  include ('../../controller/func_agcnew.php');
<<<<<<< HEAD
?>
<?php
  //session_start();

?>
=======
//<?php
//  //session_start();
//>>>>>>> dda8576583d5497a92bfbe8a7eef899180552343
//?>
>>>>>>> 19530972bfc40b0f05ebd6be420891467155b372

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
        crossorigin="anonymous">
          
      </script>

  

    </head>

    <body>

    <?php include 'header.php'; ?>
  
    <section id="main">
        <div class="container-fluid">
            <div class="row">
              <!-- include side bar -->
                <div class="col-md-3">
                     <?php include 'sidebar.php'; ?>
                </div>

          <div class="col-md-9">
            <div class="panel panel-default">
                      <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Reports</h3>
                        
                      </div>

                <div class="panel-body">
                <div class="row">

                  <div class = "col-md-12" id="loadSection">
                      <?php
                      require_once '../../controller/connect.php'

                      ?>

                      <div class="container">
                          <div class="wrapper">
                              <div class="panel panel-default">
                                  <div class="panel-heading"><h3>Reports</h3>

<<<<<<< HEAD

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
					  <a href="agrariandiscussion.php" class="list-group-item"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Discussion <span class="badge">12</span></a>
					  <a href="agrarianannouncement.php" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Posts</a>
					  <a href="agrarianreport.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Reports</a>
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
      require_once '../../controller/connect.php'
       
    ?>

   	<div class="container">
   		<div class="wrapper">
   			<div class="panel panel-default">
		      <div class="panel-heading"><h3>Reports</h3>
		      
		      </div>
		      <div class="panel-body">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><b>Summarised Paddy Report</b></a></li>
            <li><a data-toggle="tab" href="#menu1"><b>Farmer Profiles</b></a></li>
            <li><a data-toggle="tab" href="#menu2"><b>Meetings</b></a></li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">

              
               
                          <br>
              <!-- <h3>Paddy Report</h3> -->
              
              <!-- <table class='table table-responsive'>
              <tr>
                <td><h4><b>Total Production</b></h4></td>
              </tr>
              </table> -->

              <?php
                year();

//                echo "</br>";
//               echo "<button type='button' class='btn btn-primary' name='btn_generate'>Generate Report</button>";
              ?>
                <hr>


<!--              --><?php
//                 total_production();
////                paddytype_details();
//              ?>

            </div>
          </div>
            </div>

        </div>
    </section>
=======
                                  </div>
                                  <div class="panel-body">
                                      <ul class="nav nav-tabs">
                                          <li class="active"><a data-toggle="tab" href="#home"><b>Summarised Paddy Report</b></a></li>
                                          <li><a data-toggle="tab" href="#menu1"><b>Farmer Profiles</b></a></li>
                                          <li><a data-toggle="tab" href="#menu2"><b>Meetings</b></a></li>
                                      </ul>
>>>>>>> 19530972bfc40b0f05ebd6be420891467155b372

                                      <div class="tab-content">
                                          <div id="home" class="tab-pane fade in active">



                                              <br>
                                              <!-- <h3>Paddy Report</h3> -->

                                              <!-- <table class='table table-responsive'>
                                              <tr>
                                                <td><h4><b>Total Production</b></h4></td>
                                              </tr>
                                              </table> -->

                                              <?php
                                              year();

                                              //                echo "</br>";
                                              //               echo "<button type='button' class='btn btn-primary' name='btn_generate'>Generate Report</button>";
                                              ?>
                                              <hr>


                                              <!--              --><?php
                                              //                 total_production();
                                              ////                paddytype_details();
                                              //              ?>

                                          </div>
                                      </div>
                                  </div>

                              </div>
    </section>

    <?php include 'footer.php'; ?>



    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
                  </div>

                </div>

                </div>
    </body>
</html>

