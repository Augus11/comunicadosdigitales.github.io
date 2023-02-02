<?php
require '../connect.php';
require '../functions.php';

$sql = "DELETE FROM comentarios WHERE id='" . $_GET["id"] . "'";

if (mysqli_query($con, $sql)) {
    $_SESSION['prompt'] = "Comentario eliminado.";
    header('Location: ../home.php');
} else {
    $_SESSION['prompt'] = "Error eliminando el comentario.";
    header('Location: ../home.php');
}
mysqli_close($con);
?>