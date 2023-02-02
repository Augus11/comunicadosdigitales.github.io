<nav class="navbar navbar-default" style="vertical-align:middle;">
  <div class="container" style="vertical-align:middle; height:100%; text-align: center; height:100%; display: inline-block;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">



    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      
    <?php 

      if(isset($_SESSION['teacherName'], $_SESSION['password'])) {

    ?>

      <form class="navbar-form navbar-right" action="searchresults.php" method="GET">

        <div class="search-area">
        <p style="text-align:center; font-size:15px; font-weight:bold; font-family: 'Roboto', cursive;">Buscar alumno por nombre y apellido</p>

          <div class="form-group">

            <div class="search-wrap">

              <label for="searchbox" class="sr-only">Buscar:</label>
              <input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Nombre y apellido" required autocomplete="off">
              
              <div class="search-results hide"></div>

            </div>
            

          </div>
          <input type="submit" name="search" id="search-btn" value="Buscar" class="btn btn-default">

        </div>

      </form>

      <?php 

        } else {
          echo "<span class='not-logged'>No iniciaste sesión.</span>";
        }

      ?>

      


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
