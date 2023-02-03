<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_POST['update'])) {

    $fname = clean($_POST['firstname']);
    $lname = clean($_POST['lastname']);
    $course = clean($_POST['course']);
    $yrlevel = clean($_POST['apercibimientos']);

    $query = "UPDATE students SET firstname = '$fname', lastname = '$lname', course = '$course'
    WHERE id='".$_SESSION['userid']."'";

    if($result = mysqli_query($con, $query)) {

      $_SESSION['prompt'] = "Perfil Actualizado";
      header("location:profile.php");
      exit;

    } else {

      die("Error with the query");

    }

  }

  if(isset($_SESSION['dni'], $_SESSION['password'])) {


}


  if(isset($_SESSION['dni'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Editar Perfil - Colegio Preuniversitario Escobar</title>

    <link href="../admins/css/custom.css" rel="stylesheet">
	<link href="../admins/css/bootstrap.min.css" rel="stylesheet">
    <link href="../admins/assets/css/styles.css" rel="stylesheet">

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
                        <i class="material-icons">format_list_numbered</i><span>Calificacionnes</span></a>
                    </li>
                </a>
                
                <a href="Boletines/boletines.php">
                    <li class="dropdown">
                        <i class="material-icons">domain_verification</i><span>Boletín</span></a>
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
                
                                <a href="bono.php">
                    <li class="dropdown">
                            <i class="material-icons">favorite</i><span>Bono contribución</span></a>
                    </li>
                </a>
                
                <a href="help.php">
                    <li class="dropdown">
                            <i class="material-icons">help</i>

                            <span>Ayuda e información</span></a>
                    </li>
                </a>




                <li class="dropdown">
                    <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
                        
                        <div class="welcome"><?php echo "<a href='profile.php' style='font-size:20px;color:#fff;'>".$_SESSION['firstname']." ".$_SESSION['lastname']."</a>";?></div>

                        <div>
                        <p style='font-size:20px; margin-top:10px; color:white;'>ㅤㅤ</p>
                        </div>

                        <a href="logout.php" style='font-size:20px; color:white; margin-left:2px;font-weight:bold;'>Cerrar sesión<span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>

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


            <div class="main-content">

                <div class="row">

                        
                    </div>

                    <div class="card" style="min-height: 530px; width: auto;">
                        <div class="card-header">
                        <a href="home.php" class="btn btn-primary" style="width: 270px; margin:15px; margin-right:5px;">← Volver atras</a>
                                <h4 style="font-size: 20px; margin-left:17px;">Editar Perfil</h4>

                            <div style="display: flex; align-items: center; ">

                                <div id="container">
                                    <section>
                                      
                                      <div class="container">
                                      </div>
                                      

                                      <div class="edit-form box-left clearfix">
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                                          <div class="form-group" style="margin-left:15px;">
                                            <label  style='font-size:15px;'>DNI</label>
                                            
                                            <?php 
                                              $query = "SELECT dni FROM students WHERE id = '".$_SESSION['userid']."'";
                                              $result = mysqli_query($con, $query);
                                              $row = mysqli_fetch_row($result);

                                              echo "<p  style='font-size:15px;'>".$row[0]."</p>";
                                            ?>

                                          </div>


                                          <div class="form-group" style="margin-left:15px;">
                                            <label for="firstname"  style='font-size:15px; margin-bottom:15px;'>Nombre</label>
                                            <input type="text" class="form-control" name="firstname" placeholder="Nombre" required>
                                          </div>


                                          <div class="form-group" style="margin-left:15px;">
                                            <label for="lastname"  style='font-size:15px; margin-bottom:15px;'>Apellido</label>
                                            <input type="text" class="form-control" name="lastname" placeholder="Apellido" required>
                                          </div>


                                          <div class="form-group" style="margin-left:15px;">
                                            <label for="course"  style='font-size:15px; margin-bottom:15px;'>Curso</label>

                                            <select name="courses" class="form-control">
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
                                          
                                          <div class="form-footer" style="margin-left:15px;">
                                            <a href="profile.php"  style='font-size:15px;'>Volver</a>
                                            <input class="btn btn-primary" type="submit" name="update" value="Actualizar Perfil" style='margin-left:15px;'>
                                          </div>
                                          

                                        </form>
                                      </div>

                                    </section>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>