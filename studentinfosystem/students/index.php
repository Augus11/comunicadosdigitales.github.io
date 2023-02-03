<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
 
  if(isset($_POST['login'])) {

    $uname = clean($_POST['dni']);
    $pword = clean($_POST['password']);

    $uname = stripcslashes($uname);
    $pword = stripcslashes($pword);
    $uname = mysqli_real_escape_string($con, $uname);
    $pword = mysqli_real_escape_string($con, $pword);

    $query = "SELECT * FROM students WHERE dni = '$uname' AND password = '$pword'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      $_SESSION['userid'] = $row['id'];
      $_SESSION['dni'] = $row['dni'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['course'] = $row['course'];

      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];


      header("location:home.php");
      exit;

    } else {

      $_SESSION['errprompt2'] = "DNI o contraseña incorrectos.";

    }

  }

  if(!isset($_SESSION['dni'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Iniciar Sesión - Colegio Preuniversitario Escobar</title>

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


  <section class="center-text">
    
    <strong>Iniciar sesión cómo alumno</strong>

    <div class="login-form box-center">
      <?php 

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }

        if(isset($_SESSION['errprompt2'])) {
          showError();
        }

      ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="form-group">
          <label for="dni" class="sr-only">DNI</label>
          <input type="text" class="form-control" name="dni" placeholder="DNI" required autofocus>
        </div>

        <div class="form-group">
          <label for="password" class="sr-only">Contraseña</label>
          <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
        </div>
        
        <a href="register.php">No tienes cuenta?</a>

        <input class="btn btn-primary" type="submit" name="login" value="Iniciar sesión">

        <div class="form-group">
          <a href="../admins/index.php" style="width:100%;  margin-top:20px;" class="btn btn-primary">Iniciar sesión como administrador</a>
        </div>

      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php

  } else {
    header("location:profile.php");
    exit;
  }

  unset($_SESSION['prompt']);
  unset($_SESSION['errprompt2']);

  mysqli_close($con);

?>