<?php
  session_start();


  if(isset($_SESSION['adminName'], $_SESSION['password'])) {

require '../connect.php';

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM calificaciones WHERE id=$id";
    $con->query($sql);
}

echo "<script> window.location.href='CalificacionesView.php' </script>";

} else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);
exit;

?>