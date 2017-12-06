<!DOCTYPE html>
<html>
<?php
  include ('../../controller/func_agc.php');
  include ('../../controller/functions.php');
?>
<head>

	<title></title>
	<meta charset="UTF-8">
    <title>Paddy Dashboard </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
/*        .wrapper{*/
/*            width: 900px;*/
/*            margin: 0 auto;*/
/*        }*/
/*        .page-header h2{*/
/*            margin-top: 0;*/
/*        }*/
/*        table tr td:last-child a{*/
/*            margin-right: 15px;*/
/*        }*/

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
/*        </style>
</head>
<body>
	<?php
      require_once '../../controller/connect.php'

    ?>
    <?php include 'header.php'; ?>

   	<div class="container">
<!--        <h3>Reports</h3>-->
<!--        <br>-->
<!--        <br>-->
        <h3>Agrarian's service center Reports</h3>
        <hr>
   		<div class="wrapper">

          <ul class="nav nav-pills nav-stacked default" style="background-color: #F7FAFC">
            <li ><a data-toggle="tab" href="#home"><b>Summarised Paddy Report</b></a></li>
            <li ><a data-toggle="tab" href="#menu1"><b>Farmer Profiles</b></a></li>
            <li><a data-toggle="tab" href="#menu2"><b>Meetings</b></a></li>
          </ul>
          <br>
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
            <br>


              <?php
                year();
                echo "</br>";
              require '../../controller/connect.php';
              $erryear="";

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  if (empty($_POST["year"])) {
                      $erryear = "year is required";
                  } else {
                      $selectyear = mysqli_real_escape_string($conn, $_POST["year"]);
                      /*$err = validate_text_and_numbers($title);*/
                  }



                  if($erryear==""){
                      total_production($selectyear);
                      paddytype_details($selectyear);
//              production_yala($selectyear);
//              production_maha($selectyear);

                  }
              }
              ?>




            </div>
            <div id="menu1" class="tab-pane fade">
                <?php
                year();
                echo "</br>";
                require '../../controller/connect.php';
                $erryear="";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["year"])) {
                        $erryear = "year is required";
                    } else {
                        $selectyear = mysqli_real_escape_string($conn, $_POST["year"]);
                        /*$err = validate_text_and_numbers($title);*/
                    }



                    if($erryear==""){
                        farmer_details($selectyear);

                    }
                }
                ?>

            </div>
            <div id="menu2" class="tab-pane fade">
                <?php
                year();
                echo "</br>";
                //
                ?>

            </div>
          </div>
          <div name='annual'>

          </div>
		      </div>

    		</div>

   		</div>
   	</div>

</body>
</html>