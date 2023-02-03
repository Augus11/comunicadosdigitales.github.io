<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';


  if(isset($_SESSION['adminName'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Resultados de búsqueda - Colegio Preuniversitario Escobar</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include 'header.php'; ?>

  <section>

    <?php 

      if(isset($_GET['search'])) {

        $s = clean($_GET['searchbox']);

        $query = "SELECT dni, firstname, lastname, course, DATE_FORMAT(date_joined, '%m/%d/%Y') as date_joined, CONCAT(firstname, ' ', lastname) as fullname 
        FROM students WHERE dni = '$s' OR firstname = '$s' OR lastname = '$s' ORDER BY date_joined DESC LIMIT 5";
    ?>

    <div class="container"  class="display: inline-block; text-align: center; margin: 0 auto;">
      <strong class="title">Resultados de "<?php echo $s; ?>".</strong>


    


    <?php

        if($result = mysqli_query($con, $query)) {

          if(mysqli_num_rows($result) == 0) {

            echo "<p>No hay resultados.</p>";
            echo "</div>";

          } else {
            echo "</div>";
            echo "<ul class='profile-results'>";

            while($row = mysqli_fetch_assoc($result)) {

          ?>

              <li>
                <div class="result-box box-left">
                  <div class='info'><strong>DNI:</strong> <span><?php echo $row['dni']; ?></span></div>
                  <div class='info'><strong>Nombre:</strong> <span><?php echo $row['lastname']. ", ".$row['firstname']; ?></span></div>
                  <div class='info'><strong>Curso:</strong> <span><?php echo $row['course']; ?></span></div>
                  <div class='info'><strong>Fecha De Registro:</strong> <span><?php echo $row['date_joined']; ?></span></div>
                </div>
              </li>

          <?php

            }

            echo "</ul>";

          }

        } else {
          die("Error with the query");
        }

      }

    ?>
  
    <div class="container">
      <a href="home.php" class="btn btn-success">←  Volver al Inicio</a>
    </div>
    

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:index.php");
    exit;
  }

  mysqli_close($con);

?>