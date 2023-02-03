<?php
session_start();
require 'connect.php';
require 'functions.php';

if(isset($_SESSION['adminName'], $_SESSION['password'])) {


    $fullname = $_POST['fullname'];
    $selected = $_POST['selected'];
    $selected2 = $_POST['selected2'];
    $dni = $_POST['dni'];
    $asistencia = $_POST['asistencia'];




    foreach ($fullname as $index => $fullnames) 
    {
        $s_fullname = $fullnames;
        $s_selected = $selected[$index];
        $s_dni = $dni[$index];
        $s_selected2 = $selected2[$index];
        $s_asistencia = $asistencia[$index];



        $query = "INSERT INTO faltas (fullname,dni,dia,tipo) VALUES('$s_fullname', '$s_dni', '$s_selected2', '$s_asistencia')";
        $query_run = mysqli_query($con, $query);
    }

    if(!$query_run) {
        die("Invalid query.");
    }

    if($query_run) {
        header("Location: faltas.php");
        //exit(0);
    }
    else {
        header("Location: home.php");
        exit(0);
    }
}

mysqli_close($con);
?>