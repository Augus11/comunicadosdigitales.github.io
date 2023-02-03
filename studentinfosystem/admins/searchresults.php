<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';


  if(isset($_SESSION['adminName'], $_SESSION['password'])) {
      
    $dni = "";

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
            $dni = $row['dni'];
                
            $query_ap = "SELECT * FROM apercibimientos WHERE dni = '".$row['dni']."' ORDER BY id DESC";
            $resultAp = mysqli_query($con, $query_ap);
    
            $row2 = mysqli_fetch_assoc($resultAp);

          ?>

              <li>
                <div class="result-box box-left">
                  <div class='info'><strong>DNI:</strong> <span><?php echo $row['dni']; ?></span></div>
                  <div class='info'><strong>Nombre:</strong> <span><?php echo $row['lastname']. ", ".$row['firstname']; ?></span></div>
                  <div class='info'><strong>Curso:</strong> <span><?php echo $row['course']; ?></span></div>
                  <div class='info'><strong>Fecha De Registro:</strong> <span><?php echo $row['date_joined']; ?></span></div>
                  <div class='info'><strong>Apercibimientos:</strong> <span><?php echo $row2['total']; ?></span></div>
                </div>
              </li>
              

      <div style="margin:15px;">
              
            <strong style="font-size:18px;">Retiros</strong>
              
            <table class="table">
            <thead>
            <tr>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>
              

          <?php
          
                $sql = "SELECT * FROM retiros WHERE dni = '".$row['dni']."'";
                $result = $con->query($sql);
        
                if(!$result) {
                    die("Invalid query.");
                }
        
                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td style='font-size:15px;'>$row[fecha]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='retirosEdit.php?id=$row[id]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='retirosDelete.php?id=$row[id]'>Eliminar</a>
                        </td>
                        </tr>
                    ";
                    }
                

            

            echo "</ul>";

          }}

        } else {
          die("Error with the query");
        }

      }

    ?>
    
    </tbody>
    </table>
    
    <strong style="font-size:18px;">Inasistencias</strong>
              
            <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Día</th>
                <th>Tipo de falta</th>
            </tr>
            </thead>
            <tbody>
              

          <?php
                $total = 0;
                $sql3 = "SELECT * FROM faltas WHERE dni = '".$dni."'";
                $result3 = $con->query($sql3);

                if(!$result3) {
                    die("Invalid query.");
                }

                while($row3 = $result3->fetch_assoc()) {
                  $total++;
                    echo "
                        

                        <tr>
                            <td style='font-size:15px;'>$row3[id]</td>
                            <td style='font-size:15px;'>$row3[dia]</td>
                            <td style='font-size:15px;'>$row3[tipo]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='faltasEdit.php?id=$row3[id]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='faltasDelete.php?id=$row3[id]'>Eliminar</a>
                        </td>
                        </tr>
                    ";
                }
                
                ?>

                  <tr>
                      <td style='font-size:18px; font-weight:bold;'>Totales: <?php echo  $total; ?></td>
                  <td>
      
                <?php

            

            echo "</ul>";

          
      

    ?>
    
    </tbody>
    </table>
    
    
    
    
    
    
    
    
    
    
    
    
                
            <strong style="font-size:18px;">Personas autorizadas a retirar</strong>
              
            <table class="table">
            <thead>
            <tr>
                <th>Nombre de la persona</th>
                <th>DNI de la persona</th>
            </tr>
            </thead>
            <tbody>
              

          <?php
          
                $sql4 = "SELECT * FROM autorized WHERE sdni = '".$dni."'";
                $result4 = $con->query($sql4);
        
                if(!$result4) {
                    die("Invalid query.");
                }
        
                while($row4 = $result4->fetch_assoc()) {
                    echo "
                        <tr>
                            <td style='font-size:15px;'>$row4[pname]</td>
                            <td style='font-size:15px;'>$row4[pdni]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='autorizedEdit.php?id=$row4[id]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='autorizedDelete.php?id=$row4[id]'>Eliminar</a>
                        </td>
                        </tr>
                    ";
                    }
                

            

            echo "</ul>";

          

        

    ?>
    
    </tbody>
    </table>
    
    <strong style="font-size:18px;">Calificaciones</strong>
              
            <table class="table" >
            <thead>
            <tr>
                <th>Materia</th>
                <th>Evaluación</th>
                <th>Calificación</th>
            </tr>
            </thead>
            <tbody>
              

          <?php
          
                $sql5 = "SELECT * FROM calificaciones WHERE dni = '".$dni."' ORDER BY materia, test";
                $result5 = $con->query($sql5);
        
                if(!$result5) {
                    die("Invalid query.");
                }
        
                while($row5 = $result5->fetch_assoc()) {
                    echo "
                        <tr>
                            <td style='font-size:15px;'>$row5[materia]</td>
                            <td style='font-size:15px;'>$row5[test]</td>
                            <td style='font-size:15px;'>$row5[mark]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='Calificaciones/CalificacionesEdit.php?id=$row5[id]'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='Calificaciones/CalificacionesDelete.php?id=$row5[id]'>Eliminar</a>
                        </td>
                        </tr>
                    ";
                    }
                

            

            echo "</ul>";

          

        

    ?>
    
    </tbody>
    </table>
    
    <strong style="font-size:18px;">Bono Contribución - Cuotas Pagadas</strong>
              
            <table class="table" style="margin-bottom:30px:">
            <thead>
            <tr>
                <th>Cuota 1</th>
                <th>Cuota 2</th>
                <th>Cuota 3</th>
                <th>Cuota 4</th>
                <th>Cuota 5</th>
                <th>Cuota 6</th>
            </tr>
            </thead>
            <tbody>
              

          <?php
          
                                                    $sql = "SELECT * FROM bono WHERE dni = '".$dni."'";
                                                    $result = $con->query($sql);
                                                    $tag_1 = "on";

                                                    if(!$result) {
                                                        die("Invalid query.");
                                                    }

                                                    while($row = $result->fetch_assoc()) {
                                                        $checked1 = '';
                                                        $checked2 = '';
                                                        $checked3 = '';
                                                        $checked4 = '';
                                                        $checked5 = '';
                                                        $checked6 = '';
                                                        
                                                        if($row['cuota1'] === 'on')
                                                        {
                                                              $checked1 = "checked='checked'";
                                                        }
                                                        
                                                        if($row['cuota2'] === 'on')
                                                        {
                                                              $checked2 = "checked='checked'";
                                                        }
                                                        
                                                        if($row['cuota3'] === 'on')
                                                        {
                                                              $checked3 = "checked='checked'";
                                                        }
                                                        
                                                        if($row['cuota4'] === 'on')
                                                        {
                                                              $checked4 = "checked='checked'";
                                                        }
                                                        
                                                        if($row['cuota5'] === 'on')
                                                        {
                                                              $checked5 = "checked='checked'";
                                                        }
                                                        
                                                        if($row['cuota6'] === 'on')
                                                        {
                                                              $checked6 = "checked='checked'";
                                                        }
                                                        echo "
                                                            <tr>

                                                                <td style='font-size:15px;'> <input onclick='return false;' type='checkbox' <?php if($row[cuota1] === 'on') {echo $checked1} ?> </input> </td>
                                                                
                                                                <td style='font-size:15px;'> <input onclick='return false;' type='checkbox' <?php if($row[cuota2] === 'on') {echo $checked2} ?> </input> </td>


                                                                <td style='font-size:15px;'> <input onclick='return false;' type='checkbox' <?php if($row[cuota3] === 'on') {echo $checked3} ?> </input> </td>


                                                                <td style='font-size:15px;'> <input onclick='return false;' type='checkbox' <?php if($row[cuota4] === 'on') {echo $checked4} ?> </input> </td>


                                                                <td style='font-size:15px;'> <input onclick='return false;' type='checkbox' <?php if($row[cuota5] === 'on') {echo $checked5} ?> </input> </td>


                                                                <td style='font-size:15px;'> <input onclick='return false;' type='checkbox' <?php if($row[cuota6] === 'on') {echo $checked6} ?> </input> </td>
  
                                                            <td>
                                                                <a class='btn btn-primary btn-sm' href='retirosEdit.php?id=$row[id]'>Editar</a>
                                                                <a class='btn btn-danger btn-sm' href='retirosDelete.php?id=$row[id]'>Eliminar</a>
                                                            </td>
                                                            </tr>
                                                        ";
                                                        }
                                                    
                                            
                

            

            echo "</ul>";

          

        

    ?>
    
    </tbody>
    </table>
    
    <strong>Boletín</strong>
              
            <table class="table">
            <thead>
            <tr>
                <th>PDF</th>

            </tr>
            </thead>
            <tbody>
              

          <?php
          
                $sql6 = "SELECT * FROM boletines WHERE dni = '".$dni."'";
                $result6 = $con->query($sql6);

                if(!$result6) {
                    die("Invalid query.");
                }

                while($row6 = $result6->fetch_assoc()) {
                    $image =  $row6['url'];
                    $url = "$image";
                    echo "
                        <tr>
                            <td> <a href='$image' style='width:500px;' target='_blank'>Ver boletín</a> </td>
                        <td>
                            <a class='btn btn-danger btn-sm' href='boletinesDelete.php?id=$row6[id]'>Eliminar</a>
                        </td>
                        </tr>
                    ";
                }
                

            

            echo "</ul>";

          

        

    ?>
    
    </tbody>
    </table>

              </div>
  
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