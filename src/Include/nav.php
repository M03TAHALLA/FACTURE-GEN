

<?php
              session_start();
?>


  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-3 justify-content-center">


  <a href="../Commun/home.php"><img src="..\..\media\INv.webp" width="60" height="60"  class="rounded  bg-dark" alt=""></a>

    <a class="navbar-brand ps-1" href="../Commun/home.php">    IN-VOICER</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../AffichageListes/Show_Devise_Liste.php">Devis</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="../AffichageListes/Show_Articles_Liste.php">Articles</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link active" href="../AffichageListes/Show_Client_Liste.php">Clients</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link active" href="../Facturation/CreateDevisClient.php">Creer DV</a>
        </li>

     

        
      </ul>
      
      <div class="nav-item dropdown justify-content-end pe-5 me-2">
          <div class="nav-link link-dark dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">More</div>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../Commun/AboutUs.php">ABOUT US</a></li>

            <li><a class="dropdown-item" href="../Commun/ContactUs.php">CONTACT US</a></li>
            <li><hr class="dropdown-divider"></li>    
            <?php
              if(isset($_SESSION['IdCommercial']) && $_SESSION['Admin'] == true){ ?>
                <li><a class="dropdown-item" href="../AffichageListes/Show_Commercial_Liste.php">UTILISATEURS</a></li>
                <li><hr class="dropdown-divider"></li> 
                <?php  } ?>

            

            
              <?php
              if(!isset($_SESSION['IdCommercial'])){ ?>
                <li><a class="dropdown-item" href="../Authentification/login.php">LOGIN</a></li>
                <?php }
                else{ ?>
            <li><a class="dropdown-item" href="../Authentification/logout.php">LOGOUT</a></li>
                <?php  } ?>
          </ul>
      </div>
    </div>

</nav>
<!-- NAVBAR -->


