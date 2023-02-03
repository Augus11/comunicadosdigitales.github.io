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

	<title>Faltas - Colegio Preuniversitario Escobar</title>

    <link href="css/custom.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  




    <div class="wrapper">


        <div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="https://www.colegioubaescobar.gob.ar/wp-content/uploads/2020/07/cropped-WhatsApp-Image-2020-02-10-at-11.45.15.jpeg"  /><span></span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="home.php" class="dashboard"><i class="material-icons">dashboard</i><span>Inicio</span></a>
                </li>
                


                <a href="Calificaciones/calificaciones.php">
                    <li class="dropdown">
                        <i class="material-icons">domain_verification</i><span>Calificacionnes</span></a>
                    </li>
                </a>

                <a href="autorized.php">
                    <li class="dropdown">
                            <i class="material-icons">library_books</i><span>Autorizados a retirar</span></a>
                    </li>
                </a>

                <a href="Events/eventos.php">
                    <li class="dropdown">
                            <i class="material-icons">event</i>

                            <span>Eventos</span></a>
                    </li>
                </a>




                <li class="dropdown">
                    <a href="profile.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">account_circle</i><span>Cuenta</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                        <li>
                            <a href="profile.php">Mi cuenta</a>
                        </li>
                        <li>
                            <a href="editprofile.php">Editar Usuario</a>
                        </li>
                        <li>
                            <a href="changepassword.php">Cambiar Contraseña</a>
                        </li>
                    </ul>
                </li>

            </ul>


        </nav>



        <!-- Page Content  -->
        <div id="content">

            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>


                        <div>
                        </div>
                        
                        <div class="welcome"><?php echo "<a href='profile.php' style='font-size:20px;'>".$_SESSION['adminName']."</a>";?></div>

                        <div>
                        <p style='font-size:20px; margin-top:10px; color:white;'>ㅤㅤ</p>
                        </div>

                        <a href="logout.php" style='font-size:18px; color:white; margin-left:40px;'>Cerrar sesión<span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="main-content" style=" margin:0 auto;">

                <div class="row">
                        
                    </div>
                        <div class="card card-stats" style="background-color: rgb(221, 221, 221); width: 1400px; height: auto;">   
                                                
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Fecha</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Asistencia</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                        if( $_SERVER['REQUEST_METHOD'] == 'GET') {
                                            if(!isset($_GET["curso"])) {
                                                echo "<script> window.location.href='courseSelect.php' </script>";
                                                exit;
                                            }
                                            if(!isset($_GET["fecha"])) {
                                                echo "<script> window.location.href='courseSelect.php' </script>";
                                                exit;
                                            }


                                            $selected = $_GET["curso"];
                                            $selected2 = $_GET["fecha"];
                                    

                                            $getCourses1 = 'SELECT * FROM materias order by id';
                                            $getCourses2 = mysqli_query($con, $getCourses1);

                                                                          
                                            while($row = mysqli_fetch_array($getCourses2)) {
                                                $nombre = $row['nombre'];
    
                                               
                                            }
                                        
                                        ?>
                                        <a href="faltasSelect.php" class="btn btn-primary" style="width:130px; margin:10px;">← Volver atras</a>
                                        <h2 style="margin:12px; margin-top:30px; font-size:20px; font-weight:bold;">Inasistencias</h2>

                                        <hr>

                                        <?php

                                        $sql = "SELECT * FROM students WHERE course = '".$selected."'";
                                        $result = $con->query($sql);

                                        if(!$result) {
                                            die("Invalid query.");
                                        }


                                        while($row = $result->fetch_assoc()) {

                                        $fullname = $row['firstname'] . ' ' . $row['lastname'];

                                                        echo "
                                                            <tr>
                                                                <form action='uploadFalta.php' method='POST'>
                                                                    <td style='font-size:15px;'> <input name='selected[]' readonly id='selected' class='form-control' type='text' value='$selected'/></td>
                                                                    <td style='font-size:15px;'> <input name='selected2[]' readonly id='selected2' class='form-control' type='date' value='$selected2'/></td>
                                                                    <td style='font-size:15px;'> <input name='dni[]' readonly id='dni' class='form-control' type='number' value='$row[dni]'/></td>
                                                                    <td style='font-size:15px;'> <input name='fullname[]' readonly id='fullname' class='form-control' type='text' value='$fullname'/>  </td>
                                                                    <td style='font-size:15px;'> 
                                                                        <select class='form-control' name='asistencia[]'>
                                                                            <option value='Ausente'>Ausente</option>
                                                                            <option value='Falta Justificada'>Falta Justificada</option>
                                                                            <option value='1/2 Falta'>1/2 Falta</option>
                                                                            <option value='1/4 Falta'>1/4 Falta</option>
                                                                        </select>  
                                                                    </td>
                                                            </tr>         
                                                        ";
                                                    }
                                        ?>
                                            <button type='submit' name='saveData' class='btn btn-primary' style="margin:10px;">Subir Calificaciones</button>
                                    </form>                                                               
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <nav class="d-flex">
                                    <ul class="m-0 p-0">
                                        
                                    </ul>
                                </nav>

                            </div>
                            <div class="col-md-6">
                                <p class="copyright d-flex justify-content-end"> &copy 2021 
                                    <a href="#"></a> 
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>



        </div>
    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });





    </script>
</body>
</html>

<?php


  } else {
    header("location:../index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>