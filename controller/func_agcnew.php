<?php
//connection............................................................................................................
require 'connect.php';


//variables.............................................................................................................



//functions.............................................................................................................

function year(){
    require 'connect.php';
    echo "
    <form class='form-inline' method='POST' action='agrarianreport.php'>
    <fieldset>
    <div align='left'>
    <label for='year1'>Select year</label>
    <select name='year' class='form-control'  id='year'>";
    for ($i=2017; $i <2025 ; $i++) {
        $a=$i+1;
        echo "<option value='$i/$a'>$i/$a</option>";
    }
    echo"</select>";
    echo "  ";
    echo"<button type='submit' class='btn btn-primary' name='btn_generate'>Generate Report</button>
    </div>    
    ";
    echo "</fieldset>
    </table>";
    total_production();
    Paddy_sales();
}


function total_production() {
    require 'connect.php';
    if(isset($_POST['btn_generate']))
    {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);

        $qur="SELECT Paddy_quantity FROM paddy WHERE Paddy_year LIKE '%$selectyear%'";

        if($result = mysqli_query($conn, $qur)){


            if(mysqli_num_rows($result) > 0){

                $total_Production=0;
                $in_ton=0;
                while($row = mysqli_fetch_array($result)){


                    $total_Production=$total_Production+$row['Paddy_quantity'];
                    $in_ton=$total_Production/1000;

                }

                echo"</br>";
                    echo "<h3><b>Paddy Production</b></h3>";
                    echo "<hr>";
                echo "<h4><b>Total Production for the year $selectyear - </b>".$total_Production."
               Kg"." (".$in_ton."  Metric Tons)</h4>";
              paddy_production($selectyear,$total_Production);


            }
        }

    }else{
        echo "No results found";
    }
}

function paddy_production($selectyear,$total_Production){
    require 'connect.php';

    echo "<table class='table table-bordered'>";
    echo "                            <tr style='background-color: #EBEDEF'><h3><b>
                            <th class='col-md-2' align='center'>Paddy Type</th>
                            <th class='col-md-10' align='center'>Production Details</th>

                            </b></h3>
                            </tr>
                            ";
    $sql="SELECT * FROM paddytype ";
    if($reslt = mysqli_query($conn, $sql)){

        if(mysqli_num_rows($reslt) > 0) {

            while ($data = mysqli_fetch_array($reslt)) {

                $type = $data['Type_Value'];
                list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                $qur = "SELECT * FROM paddy WHERE Paddy_type LIKE '%" . $eng . "%' AND Paddy_year LIKE '%" . $selectyear . "%'";

                if ($check = mysqli_query($conn, $qur)) {
//                    echo $eng,$selectyear;

                    if (mysqli_num_rows($check) > 0) {// error occur

                        echo "5";
                        $sum = 0;
                        $sumpro = 0;
                        $totalpro_inton = 0;
                        $percentage = 0;
                        $max_value = array();

                        while ($row = mysqli_fetch_array($check)) {

                            $max_value = $row['Paddy_price'];

                            $total = $row['Paddy_price'] * $row['Paddy_quantity'];
                            $sum = $sum + $total;
                            $totalpro = $row['Paddy_quantity'];
                            $sumpro = $sumpro + $totalpro; // total of paddy type
                            $totalpro_inton = $sumpro / 1000;
                            $percentage = ($sumpro / $total_Production) * 100;
//                                  maximum_price();
//                        CHECK THIS .....................................................................................
//                        $sum_maha = 0;
//                        $maha_total = 0;
//                        $sum_yala = 0;
//                        $yala_total = 0;
//                        if ($row['Paddy_type'] == 'Yala') {
//
//                            $sum_yala = $sum_yala + $row['Paddy_quantity'];
//                            $period_value = $row['Paddy_price'] * $row['Paddy_quantity'];
//                            $yala_total = $yala_total + $period_value;
//                            $totalyala_inton = $sum_yala / 1000;
////                                            $array_data=[$sum_yala,$yala_total,$totalyala_inton,$yala_total];
////                                            return $array_data;
//                        } else if ($row['Paddy_type'] == 'Maha') {
//
//
//                            $sum_maha = $sum_maha + $row['Paddy_quantity'];
//                            $period_value = $row['Paddy_price'] * $row['Paddy_quantity'];
//                            $maha_total = $maha_total + $period_value;
//                            $totalmaha_inton = $sum_maha / 1000;
//                        }

                        }
                        $avg = $sum / $sumpro;
                        echo "<br><h4>Paddy Production Details</h4>
        <hr>
        ";
//            table_details($total_Production,$in_ton);
                        echo "
                  <table border='0'>
                    <tbody><b><h5>
                    
                    <tr>
                        
                        <td class='col-md-2'><ul><li><b>".$eng."</b></li></ul></td>
                        <td class='col-md-6'></td>
                        <td class='col-md-4'></td>
                    </tr>";

//                    echo "
////                    <tr>
////
////                        <td class='col-md-8'><ul><li><b>Total Production for the period</b></li></ul></td>
////                        <td class='col-md-4'>- " . number_format($total_Production) . "Kg (" . $in_ton . " Metric Tons)</td>
////                    </tr>
////
////
////                    <tr>
////                        <td class='col-md-8'><ul><li><b>Cost of the Total Production for the period</b></li></ul></td>
////                        <td class='col-md-4'>- Rs. " . $num_inthousands . "/=</td>
////                    </tr>
                        echo "</h5>
                    </b>
                    </tbody>
                  </table>
                    ";

//                    production_yala($type);


            }//12356


//                        table_production($type,$percentage,$sum_yala,$totalyala_inton,$sum_maha,$totalmaha_inton,$yala_total,$maha_total);
                }


//                        production_yala($total,$sumpro,$sum,$total,$totalpro,$totalpro_inton,$eng,$max_value,$percentage,$avg,$type,$selectyear);


//
            }
            // Free result set
            mysqli_free_result($check);
        }
             //werthyj
            }







    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}

//function production_yala($total,$sumpro,$sum,$total,$totalpro,$totalpro_inton,$eng,$max_value,$percentage,$avg,$type,$selectyear){
//
//}

//function table_production($type,$percentage,$sum_yala,$totalyala_inton,$sum_maha,$totalmaha_inton,$yala_total,$maha_total){
//    echo "<table class='table table-bordered'>";
//    echo "<tbody>
//                            <tr>
//                            <th class='col-md-4' align='center'rowspan='5'>".$type."</th>
//                            <td class='col-md-4' align='center'>Total Production as a percentage</td>
//                            <td class='col-md-4' align='center'>".round($percentage,2)."%"."</td>
//
//
//                            </tr>
//                            <tr>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production in Yala Season</td>
//                            <td class='col-md-4' align='center'>".$sum_yala."kg (".$totalyala_inton."Metric Tons)</td>
//
//
//                            </tr>
//                            <tr>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production cost in Yala Season</td>
//                            <td class='col-md-4' align='center'> Rs.".number_format($yala_total)."</td>
//
//
//                            </tr>
//                            <tr>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production in Maha Season</td>
//                            <td class='col-md-4' align='center'>".$sum_maha."kg (".$totalmaha_inton."Metric Tons)</td>
//
//
//                            </tr>
//                            <tr>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production cost in Maha Season</td>
//                            <td class='col-md-4' align='center'>".number_format($maha_total)."</td>
//
//
//                            </tr>
//                            </tbody>";
//}

function Paddy_sales(){
    require 'connect.php';
    if(isset($_POST['btn_generate'])) {

        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
//    echo "<h3>Total Production For the Period For each Paddy Type</h3>";
        echo "<table class='table table-bordered'>";
        echo "<thead>
                            <tr style='background-color: #EBEDEF'><h3><b>
                            <th class='col-md-4' align='center'>Paddy Type</th>
                            <th class='col-md-8' align='center'>Sales Details</th>
                            
                            </b></h3>    
                            </tr>
                            </thead>";
        $sql = "SELECT * FROM paddytype ";
        if ($reslt = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($reslt) > 0) {


                while ($data = mysqli_fetch_array($reslt)) {

                    $type = $data['Type_Value'];
                    list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";


//                    production_yala($type);

                    $qur = "SELECT * FROM ordertable WHERE Product LIKE '%$eng%'";//add period

                    if ($result = mysqli_query($conn, $qur)) {


                        if (mysqli_num_rows($result) > 0) {

                            $sum = 0;
                            $sumsales = 0;
                            $totalsales_inton = 0;
                            $percentage = 0;
                            $max_value = array();

                            while ($row = mysqli_fetch_array($result)) {

//                                $max_value = $row['Paddy_price'];


                                $sum = $sum + $row['Quantity'];
                                $totalsales_inton=$sum/1000;
                                $sumsales = $sumsales + $row['Ord_Total'];


//                            $percentage=($sumpro/$total_Production)*100;
//                                  maximum_price();
//                            $sum_maha = 0;
//                            $maha_total=0;
//                            $sum_yala = 0;
//                            $yala_total=0;
//                            if ($row['Paddy_type']=='Yala'){
//
//                                $sum_yala = $sum_yala + $row['Paddy_quantity'];
//                                $period_value=$row['Paddy_price']*$row['Paddy_quantity'];
//                                $yala_total=$yala_total+$period_value;
//                                $totalyala_inton=$sum_yala/1000;
////                                            $array_data=[$sum_yala,$yala_total,$totalyala_inton,$yala_total];
////                                            return $array_data;
//                            }else if ($row['Paddy_type']=='Maha'){
//
//
//                                $sum_maha = $sum_maha + $row['Paddy_quantity'];
//                                $period_value = $row['Paddy_price'] * $row['Paddy_quantity'];
//                                $maha_total = $maha_total + $period_value;
//                                $totalmaha_inton=$sum_maha/1000;
//                            }
                            }
//                        $avg=$sum/$sumpro;
                            table_sales($eng, $sum, $sumsales);
                        }


//                        production_yala($total,$sumpro,$sum,$total,$totalpro,$totalpro_inton,$eng,$max_value,$percentage,$avg,$type,$selectyear);


//
                    }
                    // Free result set
                    mysqli_free_result($result);
                }
                //werthyj
            }


        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}

function table_sales($eng,$sum,$sumsales){
    echo "<table class='table table-bordered'>";
    echo "
                            <tr>
                            <th class='col-md-4' align='center'rowspan='2'>".$eng."</th>
                            <td class='col-md-4' align='center'>Total sales in Kg</td>
                            <td class='col-md-4' align='center'>".$sum."</td>
                            
                                
                            </tr>
                            <tr>
                            <th class='col-md-4' align='center'></th>
                            <td class='col-md-4' align='center'>Total Sales income</td>
                            <td class='col-md-4' align='center'>".number_format($sumsales)."</td>
                            
                                
                            </tr>";
//                            <tr style='background-color: #EBEDEF'>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production cost in Yala Season</td>
//                            <td class='col-md-4' align='center'>".$yala_total."</td>
//
//
//                            </tr>
//                            <tr style='background-color: #EBEDEF'>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production in Maha Season</td>
//                            <td class='col-md-4' align='center'>".$sum_maha."kg (".$totalmaha_inton."Metric Tons)</td>
//
//
//                            </tr>
//                            <tr style='background-color: #EBEDEF'>
//                            <th class='col-md-4' align='center'></th>
//                            <td class='col-md-4' align='center'>Total Production cost in Maha Season</td>
//                            <td class='col-md-4' align='center'>".$maha_total."</td>
//
//
//                            </tr>
                            echo "
</table>";
}

function paddytype_array (){
    require 'connect.php';
    $sql = "SELECT * FROM paddytype ";


    if ($reslt = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($reslt) > 0) {

            $type_arrayeng []=array ();
            $type_arraysin [] =array ();
            $array_type [] =array ();
            while ($data = mysqli_fetch_array($reslt)) {

//                $type = $data['Type_Value'];
//                list($eng, $sin) = explode('|', $type);
                $type_arrayeng =$data['Paddy_Type'];
                $array_type=$data['Type_Sinhala'];
                $array_type=$data['Type_Value'];
            }

        }
    }
}
?>