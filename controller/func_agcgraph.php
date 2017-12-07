<?php
//connection............................................................................................................
require 'connect.php';

function production_bar ($array_costnow,$array_tpnow){
    require 'connect.php';
    if(isset($_POST['btn_generate'])) {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);


        list($year1, $year2) = explode('/', $selectyear);
        $yearnew = $year1 - 1;
        $yearpre = $yearnew . "" . $year1;
//        $year_array = array($selectyear, $yearpre);


        $qur="SELECT * FROM paddy WHERE Paddy_year LIKE '%$selectyear%'";

        if($result = mysqli_query($conn, $qur)){


            if(mysqli_num_rows($result) > 0){

                $total_Production=0;
                $in_ton=0;
                $tp_value=0;
                while($row = mysqli_fetch_array($result)){
                    $value_row=$row['Paddy_quantity']*$row['Paddy_price'];//value for row
                    $tp_value=$tp_value+$value_row;   //total calculated tp value
                    $total_Production=$total_Production+$row['Paddy_quantity']; // Total Production (tp or TP)
                    $in_ton=$total_Production/1000; // tp in metric ton

                }

                echo"</br>";
                echo "<h3><b>Paddy Production ".$selectyear."</b></h3>"."Total Production   - </b>".$total_Production."
               Kg"." (".$in_ton."  Metric Tons)<br>";
                echo "Total Production cost  - </b>Rs.".number_format($tp_value)."
               /=";
                echo "<hr>";
                echo "";
                paddy_production($selectyear,$total_Production);


            }
        }

    }else{
        echo "No results found";
    }


    }
?>