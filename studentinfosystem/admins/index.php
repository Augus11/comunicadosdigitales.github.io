<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_POST['login'])) {

    $uname = clean($_POST['adminName']);
    $pword = clean($_POST['password']);

    $uname = stripcslashes($uname);
    $pword = stripcslashes($pword);
    $uname = mysqli_real_escape_string($con, $uname);
    $pword = mysqli_real_escape_string($con, $pword);

    $query = "SELECT * FROM admins WHERE adminName = '$uname' AND password = '$pword'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      $_SESSION['userid'] = $row['id'];
      $_SESSION['adminName'] = $row['adminName'];
      $_SESSION['password'] = $row['password'];

      header("location:home.php");
      exit;

    } else {

      $_SESSION['errprompt'] = "Nombre o contraseña incorrectos.";

    }

  }

  if(!isset($_SESSION['adminName'], $_SESSION['password'])) {

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


<center>
  <section class="center-text">
    
    <strong>Iniciar sesión como administrador</strong>

    <div class="login-form box-center">
      <?php 

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }

        if(isset($_SESSION['errprompt'])) {
          showError();
        }

      ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="form-group">
          <label for="adminName" class="sr-only">adminName</label>
          <input type="text" class="form-control" name="adminName" placeholder="adminName" required autofocus>
        </div>

        <div class="form-group">
          <label for="password" class="sr-only">Contraseña</label>
          <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
        </div>
        
        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="login" style="float:left; width:100%; padding-left:63px; padding-right:63px; margin-top:20px;" value="Iniciar sesión">
        </div>

        <div class="form-group">
          <a href="../students/index.php" style="width:100%; margin-top:20px;" class="btn btn-primary">Iniciar sesión como alumno</a>
        </div>

      </form>
    </div>

  </section>
</center>

	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php

  } else {
    header("location:home.php");
    exit;
  }

  unset($_SESSION['prompt']);
  unset($_SESSION['errprompt']);

  mysqli_close($con);

?>