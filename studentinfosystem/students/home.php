<?php 
 
  session_start();

  require 'connect.php'; 
  require 'functions.php';

  if (isset($_POST['comentar']) && isset($_FILES['my_image'])) {
	include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['my_image']); 
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION); 
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO comentarios(image_url) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}

}


  if(isset($_SESSION['dni'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Inicio</title>

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
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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
                        
                        <div class="welcome"><?php echo "<a href='profile.php' style='font-size:20px; color:#fff; font-family: 'Roboto', sans-serif;'>".$_SESSION['firstname']." ".$_SESSION['lastname']."</a>";?></div>

                        <div>
                        <p style='font-size:20px; margin-top:10px; color:white;'>ㅤㅤ</p>
                        </div>

                        <a href="logout.php" style='font-size:20px; font-weight:bold; color:white; margin-left:0px; font-family: 'Roboto', sans-serif;'>Cerrar sesión<span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>

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
                    <div class="col-lg-3 col-md-6 col-sm-6">

                    <div class="card card-stats"
                            style="background-color: rgb(221, 221, 221); width: 300px; height: 150px;">
                            <h3 style="font-family: 'Roboto', cursive; margin: 15px; font-weight: 450; font-size: 20px;">Enviar mensaje al colegio</h3>
                            <a href="mensajes.php" class="btn btn-primary" style="width: 270px; margin:15px; margin-right:5px;">Enviar</a>
                        </div>

                        <div class="card card-stats"
                            style="background-color: rgb(221, 221, 221); width: 300px; height: 150px;">
                            <h3 style="font-family: 'Roboto', cursive; margin: 15px; font-weight: 450; font-size: 20px;">Apercibimientos</h3>
                            <a href="apercibimientos.php" class="btn btn-primary" style="width: 270px; margin:15px; margin-right:5px;">Ver todos</a>
                        </div>

                        <div class="card card-stats"
                            style="background-color: rgb(221, 221, 221); width: 300px; height: 150px;">
                            <h3 style="font-family: 'Roboto', cursive; margin: 15px; font-size: 20px;">Inasistencias</h3>
                            <a href="faltas.php" class="btn btn-primary" style="width: 270px; margin:15px; margin-right:5px;">Ver todos</a>
                        </div>

                        <div class="card card-stats"
                            style="background-color: rgb(221, 221, 221); width: 300px; height: 150px;">
                            <h3 style="font-family: 'Roboto', cursive; margin: 15px; font-size: 20px;">Retiros Anticipados</h3>
                            <a href="retiros.php" class="btn btn-primary" style="width: 270px; margin:15px; margin-right:5px;">Ver todos</a>
                        </div>
                        
                        <div class="card card-stats"
                            style="background-color: rgb(221, 221, 221); width: 300px; height: 150px;">
                            <h3 style="font-family: 'Roboto', cursive; margin: 15px; font-size: 20px;">Aptos y Certificados</h3>
                            <a href="images.php" class="btn btn-primary" style="width: 270px; margin:15px; margin-right:5px;">Ver todos</a>
                        </div>
                        
                    </div>

                    <div class="card" style="min-height: 485px; width: 1000px;">
                        <div class="card-header">
                                <h4 style="font-size: 20px;">Comunicados</h4>

                            <div style="display: flex; align-items: center; ">

                                <div id="container">
                                    <ul id="comments">
                                    <?php  
                                        $comentarios = mysqli_query($con, "SELECT * FROM comentarios WHERE reply = 0 AND course = '".$_SESSION['course']."' ORDER BY id DESC");
                                        while($row=mysqli_fetch_array($comentarios)) {
                                        $usuario = mysqli_query($con, "SELECT * FROM admins WHERE adminName = '".$row['adminName']. "'");
                                        $user = mysqli_fetch_array($usuario);
                                        
                                        ?>
                                        
                                        <li class="cmmnt">
                                            <div class="avatar">
                                            <img src="https://www.colegioubaescobar.gob.ar/wp-content/uploads/2020/07/cropped-WhatsApp-Image-2020-02-10-at-11.45.15.jpeg" height="55" width="45">
                                            </div>
                                            <div class="cmmnt-content">
                                                <header>
                                                <a href="#" class="userlink" style="font-size:16px;"><?php echo $row['adminName']; ?></a> <span class="pubdate" style="text-transform: lowercase; font-size:16px;">publicó en</span> <a href="#" class="userlink" style="font-size:16px;"><?php echo $row['course']; ?></a> - <span class="pubdate" style="font-size:16px;"><?php echo $row['fecha']; ?></span>
                                                </header>
                                                <p>
                                                    <?php echo $row['comentario']; ?>
                                                </p>
                                                <span>
                                                <a style="height:30px" class="btn btn-secondary" href="Messages/message-form.php?user=<?php echo $user['adminName']; ?>&id=<?php echo $row['id']; ?>">
                                                    <p style="color:white;font-size:13px;">Responder</p>
                                                </a>
                                                </span>
                                            </div>


                                            <?php
                                                $contar = mysqli_num_rows(mysqli_query($con, "SELECT * FROM comentarios WHERE reply = '".$row['id']."'"));
                                                if($contar != '0') {
                                                
                                                $reply = mysqli_query($con, "SELECT * FROM comentarios WHERE reply = '".$row['id']."' ORDER BY id DESC");
                                                while($rep=mysqli_fetch_array($reply)) {
                                                    
                                                $usuario2 = mysqli_query($con, "SELECT * FROM admins WHERE id = '".$rep['adminName']."'");
                                                $user2 = mysqli_fetch_array($usuario2);
                                            ?>
                                                
                                                <ul class="replies">
                                                    <li class="cmmnt">
                                                        <div class="avatar">
                                                <img src="https://www.colegioubaescobar.gob.ar/wp-content/uploads/2020/07/cropped-WhatsApp-Image-2020-02-10-at-11.45.15.jpeg" height="55" width="45">
                                                </div>
                                                    <div class="cmmnt-content">
                                                        <header>
                                                        <a href="#" class="userlink" style="font-size:16px;"><?php echo $rep['adminName']; ?></a> <span class="pubdate" style="text-transform: lowercase; font-size:16px;">respondió</span> - <span class="pubdate" style="font-size:16px;"><?php echo $row['fecha']; ?></span>
                                                        </header>
                                                        <p>
                                                        <?php echo $rep['comentario']; ?>
                                                        </p>
                                                    </div>
                                                    
                                                    </li>
                                                </ul>
                                                
                                                <?php } } } ?>
                                                
                                                
                                            </li> 


                                    
                                    </ul>
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
                                <p class="copyright d-flex justify-content-end"> &copy 2021 Augusto Antenucci
                                    <a href="#"></a> 
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>



        </div>
    </div>



    <div align="left" style="margin-left:280px; margin-top:25px; height:100px; ">
    <div style="height:50px;" onclick="location.href='https://chatwith.io/s/Custom-url';"  class="whatsappbutton"><i class="fa fa-whatsapp fa-2x"><img style="bottom:200px;" src="https://cdn-icons-png.flaticon.com/512/1384/1384055.png" width=25 height=25 alt=""></i>
        <span >
            Contactános
        </span>
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