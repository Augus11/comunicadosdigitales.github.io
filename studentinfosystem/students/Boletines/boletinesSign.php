<?php

  session_start();


  if(isset($_SESSION['dni'], $_SESSION['password'])) {

require '../connect.php';

if(isset($_GET["submit"])) {

    $sql = "UPDATE boletines " . "SET signed = 'on'" . "WHERE dni = $_SESSION[dni]";

    $con->query($sql);

    if (!$con) {
        die('Could not query:' . mysql_error());
    }
}

//echo "<script> window.location.href='boletines.php' </script>";

} else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);
exit;

?>