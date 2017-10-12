    <?php
      require_once ('../../controller/connect.php');
       
    ?>
   <?php
        $errdate="";
        $errtime="";
        $errpurpose="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["date"])) {
                $errdate = "Paddy Type is required";
            } else {
                $date = mysqli_real_escape_string($conn, $_POST["date"]);
                /*$err = validate_text_and_numbers($title);*/
            }

            if (empty($_POST["time"])) {
                $errtime = "Paddy price is required";
            } else {
                $time = mysqli_real_escape_string($conn, $_POST["time"]);
                
            }

            if (empty($_POST["purpose"])) {
                $errpurpose = "Paddy quantity is required";
            } else {
                $purpose = mysqli_real_escape_string($conn, $_POST["purpose"]);
                
            }            

            if($errdate=="" and $errtime=="" and $errpurpose==""){
                insertmeeting($date,$time,$purpose);
            }
        }
    ?>