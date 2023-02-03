<?php
session_start();
require '../connect.php';
require '../functions.php';

if(isset($_SESSION['adminName'], $_SESSION['password'])) {


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $selected = $_POST['selected'];
    $selected2 = $_POST['selected2'];
    $selected3 = $_POST['selected3'];
    $dni = $_POST['dni'];
    $mark = $_POST['mark'];

    foreach ($firstname as $index => $firstnames) 
    {
        $s_firstname = $firstnames;
        $s_lastname = $lastname[$index];
        $s_selected = $selected[$index];
        $s_dni = $dni[$index];
        $s_selected2 = $selected2[$index];
        $s_selected3 = $selected3[$index];
        $s_mark = $mark[$index];


        $query = "INSERT INTO calificaciones (firstname,lastname,dni,course,materia,test,mark) VALUES('$s_firstname', '$s_lastname', '$s_dni', '$s_selected', '$s_selected2', '$s_selected3', '$s_mark')";
        $query_run = mysqli_query($con, $query);
    }

    if(!$query_run) {
        die("Invalid query.");
    }

    if($query_run) {
        header("Location: courseSelect.php");
        //exit(0);
    }
    else {
        header("Location: ../home.php");
        exit(0);
    }
}

mysqli_close($con);
?>