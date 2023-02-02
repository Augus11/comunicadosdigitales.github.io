<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_SESSION['adminName'], $_SESSION['password'])) {


  if(isset($_POST['register'])) {

    $uname = clean($_POST['teacherName']); 
    $pword = clean($_POST['password']); 
    $fname = clean($_POST['firstname']); 
    $lname = clean($_POST['lastname']); 
    $course = clean($_POST['course']); 

    $uname = stripcslashes($uname);
    $pword = stripcslashes($pword);
    $uname = mysqli_real_escape_string($con, $uname);
    $pword = mysqli_real_escape_string($con, $pword);


    $query = "SELECT teacherName FROM teachers WHERE teacherName = '$uname'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0) {

      $query = "SELECT teacherName FROM teachers WHERE teacherName = '$uname'";
      $result = mysqli_query($con,$query);

      if(mysqli_num_rows($result) == 0) {

        $query = "INSERT INTO teachers (teacherName, password, firstname, lastname, course, date_joined)
        VALUES ('$uname', '$pword', '$fname', '$lname', '$course', NOW())";

        if(mysqli_query($con, $query)) {

          $_SESSION['prompt'] = "Cuenta creada con éxito.";
          header("location:index.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "El DNI ingresado ya existe.";

      }

    } else {

      $_SESSION['errprompt'] = "El DNI ingresado ya existe.";

    }

  } 

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Registrarse - Colegio Preuniversitario Escobar</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php// include 'header.php'; ?>

  <section class="center-text">
    
    <strong>Registrar Coordinador</strong>

    <div class="registration-form box-center clearfix">

    <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="row">
          <div class="account-info col-sm-6">
          
            <fieldset>
              <legend>Información de cuenta</legend>
              
              <div class="form-group">
                <label for="adminName">Usuario de Coordinador</label>
                <input type="text" class="form-control" name="teacherName" placeholder="Admin Name" required>
              </div>

              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
              </div>

            </fieldset>
            

          </div>

          <div class="personal-info col-sm-6">
            
            <fieldset>
              <legend>Información Personal</legend>

              <div class="form-group">
                <label for="firstname">Nombre</label>
                <input type="text" class="form-control" name="firstname" placeholder="Nombre" required>
              </div>

              <div class="form-group">
                <label for="lastname">Apellido</label>
                <input type="text" class="form-control" name="lastname" placeholder="Apellido" required>
              </div>

              <div class="form-group">
                <label for="course">Cursos</label>
                  <select name="course" multiple>
                  <?php
                  require 'connect.php';
                  $getCourses1 = "SELECT * FROM courses order by id";
                  $getCourses2 = mysqli_query($con, $getCourses1);

                  while($row = mysqli_fetch_array($getCourses2)) {
                      $id = $row['id'];
                      $course = $row['course'];

                      ?>
                      <option value="<?php echo $id; ?>"><?php echo$course; ?></option>
                      <?php
                  }
                  ?>
                </select>

              </div>

            </fieldset>
            

          </div>
        </div>

        
        
        <a style="color:white;" class="btn btn-primary" onclick="history.back()">← Volver atras</a>
        <input class="btn btn-primary" type="submit" name="register" value="Registrar">



      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

} else {
  header("location:index.php");
  exit;
}

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>