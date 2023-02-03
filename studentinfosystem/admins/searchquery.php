<?php 


	require 'connect.php';
	require 'functions.php';

	$s = clean($_GET['s']);

	$query = "SELECT dni, firstname, lastname, course, CONCAT(firstname, ' ', lastname) as fullname 
	FROM students WHERE firstname LIKE '".$s."%' OR lastname LIKE '".$s."%' ORDER BY date_joined DESC LIMIT 5";

	if($result = mysqli_query($con, $query)) {

		if(mysqli_num_rows($result) == 0) {
			echo "<ul><li class='none'>No hay resultados</li></ul>";
		} else {

			echo "<ul>";

			while($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo "<span class='name'>".$row['dni']."</span>";

				echo "<div class='details'>";

				echo "<span><strong>Nombre: </strong>".$row['fullname']."</span>";
				echo "<span><strong>Curso: </strong>".$row['course']."</span>";

				echo "</div></li>";

			}

			echo "</ul>";

		}

	} else {
		die("Error with the query");
	}

	mysqli_close($con);

?>
