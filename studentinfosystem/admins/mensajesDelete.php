<?php
require 'connect.php';
require 'functions.php';

$sql = "DELETE FROM mensajes WHERE id='" . $_GET["id"] . "'";

if (mysqli_query($con, $sql)) {
    $_SESSION['prompt'] = "Comentario eliminado.";
    header('Location: mensajes.php');
} else {
    $_SESSION['prompt'] = "Error eliminando el comentario.";
    header('Location: mensajes.php');
}
mysqli_close($con);
?>