

<?php
//connection............................................................................................................
require 'connect.php';


//variables.............................................................................................................



//functions.............................................................................................................


//User selecting the year
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
        echo "<option value='$i/$a'>$i/$a</option>";//to get the next year
    }
    echo"</select>";
    echo "  ";
    echo"<button type='submit' class='btn btn-primary' name='btn_generate'>Generate Report</button>
    </div>    
    ";
    echo "</fieldset>
    </table>";
    // functions to call
    total_production();
    Paddy_sales();
//    meeting_details();
//    new_profiles();
//
}


//.......................Functions for Paddy production and Sales.......................................................

//calculating the total production for the period
function total_production() {
    require 'connect.php';
    if(isset($_POST['btn_generate']))
    {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);

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
//paddy production for the period
function paddy_production($selectyear,$total_Production){
    require 'connect.php';

//    echo "<table class='table table-bordered'>";
//    echo "                            <tr style='background-color: #EBEDEF'><h3><b>
//                            <th class='col-md-2' align='center'>Paddy Type</th>
//                            <th class='col-md-10' align='center'>Production Details</th>
//
//                            </b></h3>
//                            </tr>
//                            ";
    $sql="SELECT * FROM paddytype ";// selecting the paddy types  in the datbase
    if($reslt = mysqli_query($conn, $sql)){
        echo "<h4>Paddy Production Details for each Paddy Type</h4>";
        if(mysqli_num_rows($reslt) > 0) {

            while ($data = mysqli_fetch_array($reslt)) {

                $type = $data['Type_Value'];
                list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";
                $qur = "SELECT * FROM paddy WHERE Paddy_type LIKE 'Samba' AND Paddy_year LIKE '2017/2018'";// query to run the production

                if ($check = mysqli_query($conn, $qur)) {
//                    echo $eng,$selectyear;

                    if (mysqli_num_rows($check) > 0) {// error occur


                        $sum = 0;
                        $sumpro = 0;
                        $totalpro_inton = 0;
                        $percentage = 0;
//                        $max_value [] = array();


                        while ($row = mysqli_fetch_array($check)) {

                            $max_value[] = $row['Paddy_price'];//storing price in an array
                            $total = $row['Paddy_price'] * $row['Paddy_quantity'];//total production in row
                            $sum = $sum + $total;// adding T.P to existing sum
                            $totalpro = $row['Paddy_quantity'];
                            $sumpro = $sumpro + $totalpro; // total of paddy type
                            $totalpro_inton = $sumpro / 1000;// T.P in metric tons
                            $percentage = ($sumpro / $total_Production) * 100;//Percentage per T.P
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

             echo "           
        
        ";
//            table_details($total_Production,$in_ton);
                        echo "
                   
                  <table class='table table-bordered'>
                    <tbody><b><h5>
                    
                    <tr>
                        
                        <td class='col-md-4' rowspan='6'><b>".$eng."</b></td>
                        <td class='col-md-6' rowspan='2'>Total Production for the period</td>
                        <td class='col-md-2'>".$sumpro." kg</td>
                    </tr>
                    <tr>
                        
                        
                        
                        <td class='col-md-2'>".$totalpro_inton." (Metric Tons)</td>
                    </tr>
                        <tr>
                        
                        
                        <td class='col-md-6'>Total Production cost for the period</td>
                        <td class='col-md-2'>Rs.".number_format($sum)."/=</td>
                    </tr>
                    <tr>
                        
                        
                        <td class='col-md-6'>Percentage per Total Production</td>
                        <td class='col-md-2'>".round($percentage,2)."%</td>
                    </tr>
                    <tr>
                        
                        
                        <td class='col-md-6'>Maximum Paddy Price</td>
                        <td class='col-md-2'>Rs. ".max($max_value)."</td>
                    </tr>
                    <tr>
                        
                       
                        <td class='col-md-6'>Minimum Paddy Price</td>
                        <td class='col-md-2'>Rs. ".min($max_value)."</td>
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
                        echo "
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
        }else{
            echo "No results found";
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



//function paddy sales details
function Paddy_sales(){
    require 'connect.php';
    if(isset($_POST['btn_generate'])) {

        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
//    echo "<h3>Total Production For the Period For each Paddy Type</h3>";
        echo "<h4>Paddy Production Details for each Paddy Type</h4>";
//        echo "<table class='table table-bordered'>";
//        echo "<thead>
//                            <tr style='background-color: #EBEDEF'><h3><b>
//                            <th class='col-md-4' align='center'>Paddy Type</th>
//                            <th class='col-md-8' align='center'>Sales Details</th>
//
//                            </b></h3>
//                            </tr>
//                            </thead>";
        $sql = "SELECT * FROM paddytype ";
        if ($reslt = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($reslt) > 0) {


                while ($data = mysqli_fetch_array($reslt)) {

                    $type = $data['Type_Value'];
                    list($eng, $sin) = explode('|', $type);

//                            echo "<tr>";
//                            echo "<td colspan='4' style=' background-color:#CCD1D1  ;' height='30px'><h4> " . $eng. "</h4></td>";


//                    production_yala($type);

                    $qur = "SELECT * FROM ordertable WHERE Product='Samba' and Ord_Date='2017' and status='completed'";//add period

                    if ($result = mysqli_query($conn, $qur)) {

                        echo "ewfrget";
                        if (mysqli_num_rows($result) > 0) {

                            $sum = 0;
                            $sumsales = 0;
                            $totalsales_inton = 0;
                            $percentage = 0;
//                            $max_value = array();

                            while ($row = mysqli_fetch_array($result)) {

//                               $max_value [] = $row['Paddy_price'];


                                $sum = $sum + $row['Quantity'];//total sales units
                                $totalsales_inton=$sum/1000;// total sales units in tons
                                $sumsales = $sumsales + $row['Ord_Total'];//sales income


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
                            echo "
                   
                  <table class='table table-bordered'>
                    <tbody><b><h5>
                    
                    <tr>
                        
                        <td class='col-md-4' rowspan='2'><b>".$eng."</b></td>
                        <td class='col-md-6' rowspan='2'>Total Sales Units</td>
                        <td class='col-md-2'>".$sum." kg</td>
                    </tr>
                    <tr>
                        
                        
                        
                        <td class='col-md-2'>".$sumsales." (Metric Tons)</td>
                    </tr>
                     >";

                            echo "
                    </tbody>
                  </table>
                 
                    ";
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

//function paddytype_array (){
//    require 'connect.php';
//    $sql = "SELECT * FROM paddytype ";
//
//
//    if ($reslt = mysqli_query($conn, $sql)) {
//        if (mysqli_num_rows($reslt) > 0) {
//
//            $type_arrayeng []=array ();
//            $type_arraysin [] =array ();
//            $array_type [] =array ();
//            while ($data = mysqli_fetch_array($reslt)) {
//
////                $type = $data['Type_Value'];
////                list($eng, $sin) = explode('|', $type);
//                $type_arrayeng =$data['Paddy_Type'];
//                $array_type=$data['Type_Sinhala'];
//                $array_type=$data['Type_Value'];
//            }
//
//        }
//    }
//}




//..................................................Functions for farmer profiles.......................................
function new_profiles (){
    require 'connect.php';
    if(isset($_POST['btn_generate']))
    {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);

        $qur="SELECT * FROM login WHERE type='Farmer' and Date='2017'";

        if($result = mysqli_query($conn, $qur)){

            $length_arr=0;
            if(mysqli_num_rows($result) > 0){


                while($row = mysqli_fetch_array($result)){
                    $array_count []=$row['username'];
                    $username=$row['firstName']." ".$row['lastName'];

                }
                $length_arr=count($array_count);
                echo"</br>";
                echo "<h4><b>Number of Profiles Created  -</b></h4>".$length_arr."";
               


            }
        }

    }else{
        echo "No results found";
    }
}




//......................................................Functions for meeting details...................................
function meeting_details ()
{
    require 'connect.php';
    if (isset($_POST['btn_generate'])) {
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
        $qur = "SELECT * FROM announcement WHERE Date LIKE '%".$selectyear."%' and Topic='Meeting'";

        if ($result = mysqli_query($conn, $qur)) {


            if (mysqli_num_rows($result) > 0) {

                $total_Production = 0;
                $in_ton = 0;
                while ($row = mysqli_fetch_array($result)) {



                }


            }
        }
    }
}
?>