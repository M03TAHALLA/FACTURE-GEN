
<?php include '../Include/head.php'; ?>


	  <title>HOME</title>
  </head>
  <body>
<?php 	include ("../Include/nav.php");?>
<div class="container">
<div class="bg-white py-5">
 <!-- HOME -->
 <div class="container py-5">
<div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
              <h2 class="font-weight-light">welcome to test web app.</h2>
        <p class="font-italic text-muted mb-4">SCHIELE MAROC  propose différentes solutions pour optimiser vos activités commerciales.
 Concentrez-vous sur votre cœur de métier. Simplifiez votre quotidien et prenez les bonnes décisions !</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="../../media/undraw_Welcoming_re_x0qo.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div></div></div>

    <!-- -->
    <div class="row row-cols-1 row-cols-md-3 g-4 m-5" id="services">
  <div class="col">
    <div class="card h-100">
      <img src="../../media/undraw_Progress_tracking_re_ulfg.png" class="card-img-top" alt="Creer un devis"/>

      <div class="card-body" >
        <h5 class="card-title">Creer un devis</h5>
        <p class="card-text">
         Créez vos devis en 2 minutes et convertissez-les en factures en seulement 1 clic.
        </p>
      </div>
      <div class="card-footer cardFooter_">
        <a href="../Facturation/CreateDevis.php"><button class="btn button_style">START</button></a>
      </div>
    </div>
  </div>

        <!-- -->

        <div class="col">
    <div class="card h-100">
      <img src="../../media/undraw_File_searching_re_3evy.png" alt="Consulter un devis"/>
      <div class="card-body">
        <h5 class="card-title">Consulter un devis</h5>
        <p class="card-text">Retrouvez facilement tous vos devis en cas de besoin. Votre devis pourra alors devenir une facture en quelques clics.</p>
      </div>
      <div class="card-footer cardFooter_">
        <a href="../AffichageListes/Show_Devise_Liste.php"><button class="btn button_style">START</button></a>
      </div>
    </div>
  </div>

  <!---->

  <div class="col">
    <div class="card h-100">
      <img src="../../media/undraw_Agreement_re_d4dv.png" class="card-img-top" alt="Client et Fournisseurs"/>
      <div class="card-body " >
        <h5 class="card-title">Clients et Fournisseurs</h5>
        <p class="card-text">
           Ajoutez et recuperez toutes les informations concernant vos clients.Faites de même avec vos fournisseurs et économisez de précieuses minutes !
        </p>
      </div>
      <div class="card-footer cardFooter_ " >
        <a href="../AffichageListes/Show_Fornisseur_Liste.php"><button class="btn button_style">START</button></a>
      </div>
    </div>
  </div>
</div></div>
    
<!-- -->
<div class="bg-white py-5">

  <div class="container py-5">


    <div class="row align-items-center" id="about_us">
      <div class="col-lg-5 px-5 mx-auto"><img src="../../media/undraw_Landing_page_re_6xev.png" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6 ms-3"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Vous ne savez pas par où commencer?</h2>
        <p class="font-italic text-muted mb-4 ">C'est bon, nous sommes là pour vous aider !!
            Nous avons une page de documentation super facile qui vous expliquera tout.</p><a href="AboutUs.php" class="btn btn-light px-5 rounded-pill shadow-sm">Apprendre encore plus</a>
      </div>
    </div>
  </div>
</div>
  <!-- HOME -->




  
<?php include '../Include/foot.php'; ?>
