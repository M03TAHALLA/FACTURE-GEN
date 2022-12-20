<?php include '../Include/head.php'; ?>
<?php 	include ("../Include/nav.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Creation Bon De Commande</title>
<link rel="stylesheet" href="StyleCreationBdC.css">
<script src="CreationBaseDonne.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form id="regForm">
                <h1 id="register">Bon De Commande Infos ? </h1>
                <div class="all-steps" id="all-steps"> 
                  <span class="step"><i class="fa fa-hand-paper-o"></i></span> 
                  <span class="step"><i class="fa fa-dollar"></i></span>
                  <span class="step"><i class='fa fa-calendar'></i></span>
                </div>

                <div class="tab">
                  <h6>What's your Num Commande</h6>
                    <p>
                      <input placeholder="Num Commande" oninput="this.className = ''" name="fname"></p>
                    
                </div>
                <div class="tab">
                  <h6>What's your Total Prix ?</h6>
                    <p><input placeholder="Prix" oninput="this.className = ''" name="dd"></p>
                    
                </div>
                <div class="tab">
                    <h6>What's your DateCréation</h6>
                    <p><input type="date" placeholder="Date Création" oninput="this.className = ''" name="email"></p>
                 
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> 
                      <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php include '../Include/foot.php'; ?>
