<?php

function check_available ()
{
    require 'connect.php';
    if (isset($_POST['btn_generate'])) {
        require 'connect.php';
        $selectyear = mysqli_real_escape_string($conn, $_REQUEST['year']);
        $selectseason = mysqli_real_escape_string($conn, $_REQUEST['season']);


    }

}

?>