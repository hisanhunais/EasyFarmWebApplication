<?php

//issues................................................................................................................
//issues with the sales calculation
//selecting the status
//not displaying the values



//connection............................................................................................................
    require 'connect.php';

//variables.............................................................................................................
$sessionID="KamalPerera";
$length=0;

//functions.............................................................................................................
    function select(){

        require 'connect.php';

        echo "
        <form class='form-inline' method='POST' action='../../view/farmer/report_paddy.php'>
            <fieldset>
            <label for='paddyseason'>Select season</label>
            <select name='season' class='form-control' placeholder='Select category' id='season'>
                <option>All</option>
                <option>Yala</option>
                <option>Maha</option>
            </select>
            
            <label for='paddyyear'>Select year</label>
            <select name='year' class='form-control' placeholder='Select category' id='year'>";
                for ($i=2017; $i <2025 ; $i++) {
                    $a=$i+1;
                    echo "<option value='$i/$a'>$i/$a</option>";
                }
            echo"</select>";
            echo "  ";
            echo"<button type='submit' class='btn btn-primary' name='btn_generate'>Generate Report</button>";

            echo "</fieldset>
        
    
        ";
        require 'connect.php';
        $erryear="";
        $errseason="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["year"])) {
                $erryear = "year is required";
            } else {
                $selectyear = mysqli_real_escape_string($conn, $_POST["year"]);
                /*$err = validate_text_and_numbers($title);*/
            }

            if (empty($_POST["season"])) {
                    $errseason = "season is required";
            } else {
                    $selectseason = mysqli_real_escape_string($conn, $_POST["season"]);
                    /*$err = validate_text_and_numbers($title);*/
            }
            if($erryear=="" and $errseason==""){
                generate($selectseason,$selectyear);

                paddy_sales($selectseason,$selectyear);

//                total_production($selectyear);
//                paddytype_details($selectyear);
            }
        }
//        paddy_sales();


    }

    function generate(){
        GLOBAL $sessionID;

        require 'connect.php';
        if(isset($_POST['btn_generate']))
        {
            require 'connect.php';
            $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
            $selectseason = mysqli_real_escape_string($conn, $_REQUEST['season']);
//            annual_production($selectyear);
//            echo "<div align='right'>
//            <a href='' ><h4>Graphical representation <span class=\"badge\">Click Here</span></h4></a>
//            </div>";

            if ($selectseason=='All') {
                $qur = "SELECT * FROM paddy WHERE Paddy_year LIKE '%".$selectyear."%' and farmer_username LIKE '%".$sessionID."%'";

                if ($result = mysqli_query($conn, $qur)) {


                    if (mysqli_num_rows($result) > 0) {

                            echo "<h3><b>Showing results of :" . $selectyear . "</b></h3>";
                        }
                        production_cal($result,$selectyear,$selectseason);
                    }else{
                        echo "<h3><e>No results found</e></h3>";
                    }
                }

            }
            if($selectseason=='Yala'){
                require 'connect.php';

                $qur = "SELECT * FROM paddy WHERE Paddy_season='Yala' and Paddy_year LIKE '%".$selectyear."%' and farmer_username LIKE '%$sessionID%'";

                if ($result = mysqli_query($conn, $qur)) {

//                    echo "wreth";
                    if (mysqli_num_rows($result) > 0) {

                        echo "<h3><b>Showing results of :" . $selectyear . " (" . $selectseason . " season) </b></h3>";

                        production_cal($result,$selectyear,$selectseason);

                    }else{
                        echo "<h3><e>No results found</e></h3>";
                    }
                }


            }
            if($selectseason=='Maha'){
            require 'connect.php';

            $qur = "SELECT * FROM paddy WHERE Paddy_season='Maha' and Paddy_year LIKE '%".$selectyear."%' and farmer_username LIKE '%".$sessionID."%'";

            if ($result = mysqli_query($conn, $qur)) {

//                    echo "wreth";
                if (mysqli_num_rows($result) > 0) {

                    echo "<h3><b>Showing results of :" . $selectyear . " (" . $selectseason . " season) </b></h3>";

                    production_cal($result,$selectyear,$selectseason);

                }else{
                    echo "<h3><e>No results found</e></h3>";
                }
            }


            }

    }

    function production_cal($result,$selectyear,$selectseason)
    {

        require 'connect.php';
        $total_Production = 0;
        $in_ton = 0;
        $cost_tp = 0;
        $cost_unit = 0;
//        $harvested=[];
        $value = "";
        $Paddy_array = array();
        $Paddyproduction_array = array();
        while ($row = mysqli_fetch_array($result)) {
//            $value=$row['Paddy_type'];
            $Paddy_array [] = $row['Paddy_type'];
            $harvested = $row['Paddy_type'];
            $total_Production = $total_Production + $row['Paddy_quantity'];
            $in_ton = $total_Production / 1000;
            $cost_unit = $row['Paddy_quantity'] * $row['Paddy_price'];
            $cost_tp = $cost_tp + $cost_unit;
            $num_inthousands = number_format($cost_tp);

        }
        $length=count($Paddy_array);

//        print_r($Paddy_array);
        echo "<br><h4>Paddy Production Details</h4>
        <hr>
        ";
//            table_details($total_Production,$in_ton);
        echo "
                  <table border='0'>
                    <tbody><b><h5>
                    
                    <tr>
                        
                        <td class='col-md-8'><ul><li><b>Paddy Types Harvested</b></li></ul></td>
                        <td class='col-md-4'></td>
                    </tr>";
        foreach ($Paddy_array as $value) {

            echo "<tr>
                    <td class='col-md-8'></td>
                    <td class='col-md-4'>-" . $value . " </td></tr>";
        }

         echo "           
                    <tr>
                        
                        <td class='col-md-8'><ul><li><b>Total Production for the period</b></li></ul></td>
                        <td class='col-md-4'>- " . number_format($total_Production) . "Kg (" . $in_ton . " Metric Tons)</td>
                    </tr>
                    
                    
                    <tr>
                        <td class='col-md-8'><ul><li><b>Cost of the Total Production for the period</b></li></ul></td>
                        <td class='col-md-4'>- Rs. " . $num_inthousands . "/=</td>
                    </tr>
                    </h5>
                    </b>
                    </tbody>
                  </table>
                    ";
//1111111111111111111111111111111111
        if ($length>1){
            Calculate_bytype($selectyear,$selectseason,$Paddy_array);
        }
        }

        function paddy_sales()
        {

            require 'connect.php';
            if (isset($_POST['btn_generate'])) {
                $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
                $selectseason = mysqli_real_escape_string($conn, $_REQUEST['season']);

                GLOBAL $sessionID;
                require 'connect.php';
//            list($year1, $year2) = explode('/', $selectyear);

                $qur = "SELECT * FROM ordertable WHERE seller_username LIKE '%" . $sessionID . "%'";

                if ($result = mysqli_query($conn, $qur)) {


                    if (mysqli_num_rows($result) > 0) {
                        $sales_inunits = 0;
//                    $sales_array = array ();
                        $sales_invalue = 0;
                        while ($row = mysqli_fetch_array($result)) {
//                        $sales_array []=$row['Paddy_type'];
                            $sales_inunits = $sales_inunits + $row['Quantity'];
                            $sales_invalue = $sales_invalue + $row['Ord_Total'];
                            $sales_inton = $sales_inunits / 1000;
//                    $yala_year=['03','04','05','06','07'];
//                    $maha_year1=['08','09','10','11','12'];
//                    $year_complete=['03','04','05','06','07','08','09','10','11','12'];
//                    $maha_year2=['01','02'];
//                    $dat = $row['Ord_Date'];
//                    list($year,$month,$day ) = explode('-', $dat);

//                    if($selectseason=='yala') {
//                        if ($row['Ord_Date'] == $year1){
//                            if (in_array($month,$yala_year)) {
//                                $new_date=$year1."-".$month;
//                                calculate_sales_period($new_date);
//                            }
//                        }
//                    }
//                    if($selectseason=='Maha') {
//                        if ($row['Ord_Date'] == $year1){
//                            if (in_array($month,$maha_year1)) {
//                                $new_date=$year1."-".$month;
//                                calculate_sales_period($new_date);
//                            }
//                        }
//                        if ($row['Ord_Date'] == $year2){
//                            if (in_array($month,$maha_year2)) {
//                                $new_date=$year2."-".$month;
//                                calculate_sales_period($new_date);
//                            }
//                        }
//                    }else{
//                        if ($row['Ord_Date'] == $year1){
//                            if (in_array($month,$year_complete)) {
//                                $new_date=$year1."-".$month;
//                                calculate_sales_period($new_date);
//                            }
//                        }else{
//                            if (in_array($month,$maha_year2)) {
//                                $new_date=$year1."-".$month;
//                                calculate_sales_period($new_date);
//                            }
//                        }
//                    }
                        }
//                $sales_array=[$sales_inunits];
//                echo $sales_array;
                        echo "<br><h4>Paddy Sales Details</h4><hr>
        ";
//            table_details($total_Production,$in_ton);
                        echo "
                  <table border='0'>
                    <tbody><b><h5>
                    <tr>
                        
                        <td class='col-md-8'><ul><li><b>Total Sales for the period</b></li></ul></td>
                        <td class='col-md-4'>- " . number_format($sales_inunits) . "Kg (" . $sales_inton . " Metric Tons)</td>
                    </tr>
                    
                    
                    <tr>
                        <td class='col-md-8'><ul><li><b>Total Sales Income</b></li></ul></td>
                        <td class='col-md-4'>- Rs. " . number_format($sales_invalue) . "/=</td>
                    </tr>
                    </h5>
                    </b>
                    </tbody>
                  </table>
                    ";
                    }
                } else {

                }
            }
        }

//    function calculate_sales_period ($new_date){********************************************************************************
//        GLOBAL $sessionID;
//        require 'connect.php';
//        $qur = "SELECT * FROM ordertable WHERE Ord_Date LIKE '%$new_date%' and seller_username LIKE '%$sessionID%'";//add stattus................
//
//        if ($result = mysqli_query($conn, $qur)) {
//
//
//            if (mysqli_num_rows($result) > 0) {
//                $total_sales=0;
//                $total_salesval=0;
//                while ($row = mysqli_fetch_array($result)) {
//                    $total_sales=$total_sales+$row['Quantity'];
//                    $total_salesval=$total_salesval+$row['Ord_Total'];
//                    ;
//
//                }
//                sales_details($total_salesval,$total_sales);
//            }
//        }
//    }


//    function sales_details($total_sales,$total_salesval)****************************************************************************
//    {
//        $num_inthousands = number_format($total_salesval);
//        echo "<br><h4>Paddy Sales Details</h4>
//        ";
//        echo "
//                  <table border='0'>
//                    <tbody><b><h5>
//                    <tr>
//                        <td class='col-md-8'><ul><li>Total Sales for the period</li></ul></td>
//                        <td class='col-md-4'>- " . $total_sales . " kg</td>
//                    </tr>
//
//
//                    <tr>
//                        <td class='col-md-8'><ul><li>Total Sales in Rupees</li></ul></td>
//                        <td class='col-md-4'>- Rs. " . $num_inthousands . "/=</td>
//                    </tr>
//                    </h5>
//                    </b>
//                    </tbody>
//                  </table>
//                    ";
//    }
//    }

//function total_fertilizer (){
//
//}
//11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
function calculate_bytype($selectyear,$selectseason,$Paddy_array){
    require 'connect.php';
    GLOBAL $sessionID;
    foreach ($Paddy_array as $value) {

        $qur = "SELECT * FROM paddy WHERE Paddy_season LIKE '%" . $selectseason . "&' and Paddy_year LIKE '%" . $selectyear . "%' and Paddy_type LIKE '%" . $value . "%'  and farmer_username LIKE '%" . $sessionID . "%'";
//        echo $selectseason;
//        echo $selectyear;
        if ($result = mysqli_query($conn, $qur)) {

            if (mysqli_num_rows($result) > 0) {

                $pro_unit=0;

                $pro_value=0;
                while ($row = mysqli_fetch_array($result)) {
                    $pro_unit=$pro_unit+$row['Paddy_quantity'];
                    $pro_inton=$pro_unit/1000;
                    $value_per=$row['Paddy_price']*$row['Paddy_quantity'];
                    $pro_value=$pro_value+$value_per;

                }
                echo "
                  <table border='0'>
                    <tbody><b><h5>
                    <tr>

                        <td class='col-md-8'><ul><li>Total Production for the Period in each Paddy Type </li></ul></td>
                        <td class='col-md-4'>- " . number_format($pro_unit) . "Kg (" . $pro_inton . " Metric Tons)</td>
                    </tr>


                    <tr>
                        <td class='col-md-8'><ul><li>Total production cost</li></ul></td>
                        <td class='col-md-4'>- Rs. " . number_format($pro_value) . "/=</td>
                    </tr>
                    </h5>
                    </b>
                    </tbody>
                  </table>
                    ";
            } else {
                echo "<h3><e>No results found</e></h3>";
            }
        }
    }
}
?>