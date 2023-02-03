<?php session_start() ?>

<?php

if(isset($_SESSION['adminName'], $_SESSION['password'])) {
    
require_once('../connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $con->close();
    exit;
}

$delete = $con->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Evento eliminado correctamente.'); window.location.href = 'eventos.php'; </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$con->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$con->close();

  } else {
    header("location:../index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  unset($_SESSION['errprompt']);

?>