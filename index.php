<!DOCTYPE html> 
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Iniciar Sesión - Colegio Preuniversitario Escobar</title>

	<link href="studentinfosystem/admins/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="studentinfosystem/admins/assets/css/main.css" rel="stylesheet">
</head>

<style>
    .topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

@media screen and (max-width: 600px){

    img {
        margin-left:0;
        text-align:center;
    }
}


</style>

<body>
    
<div class="topnav">
  <img src="logo.png" height="65" width="55" style="margin:15px; margin-left:30px;"></img>
</div>

  <section class="center-text">
    
    <div class="login-form box-center" style="margin-top:20px;">
    
    
        <h2 align="center">Bienvenido</h2>

        <p align="center">Iniciar sesión como</p>

        
        <div class="form-group">
          <a href="studentinfosystem/students/index.php" style="float:center; width:100%; word-wrap: break-word;" class="btn btn-primary"><i style="font-size: 25px; margin-right:5px;" class="fa fa-graduation-cap"></i>Estudiante</a>
        </div>
        
        <div class="form-group">
          <a href="studentinfosystem/teachers/index.php" style="width:100%;" class="btn btn-primary"><i style="font-size: 25px; margin-right:5px;" class="fa fa-user"></i>Coordinador</a>
        </div>
        
        <div class="form-group">
          <a href="studentinfosystem/admins/index.php" style="width:100%;" class="btn btn-primary"><i style="font-size: 25px; margin-right:5px;" class="fa fa-lock"></i>Administrador</a>
        </div>

    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>