<!-- INCLUDING NECESSARY FILES  -->
<?php


    include '../Include/head.php'; 
    include '../Include/nav.php';
    include '../../db/conn.php';
    include("../Authentification/Check_if_Logged_In.php");

    $id = "";
    $idClient = "";
    $dateCreation = "";
    $dateExpiration = "";
    $totalePrix = 0.0;
    $titleClt = "";
    // CHECKING IF WE GOT A GET REQUEST
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        

        if(!isset($_GET['id'])){
            header("location: ../AffichageListes/Show_Devise_Liste.php");
            exit();
        }
        
        // GETTING THE ID FROM THE GET REQUEST
        $id = $_GET['id'];

        // READ THE DATA FROM DB BY ID

        $sql = "SELECT f.DateCreation, f.DateExpiration, c.Sexe, c.Nom, c.Prenom, c.Email, c.Adresse FROM fichdevis AS f LEFT JOIN client AS c ON f.IdClient = c.IdClient WHERE NumDevis = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

      

        if(!$row){
            header("location: ../AffichageListes/Show_Devise_Liste.php");
            exit();
        }

        

        $sexeClt = $row['Sexe'];

        // GIVE THE RIGHT TITLE IF CLIENT IS MALE OR FEMALE 
        if($sexeClt == "Female")
            $titleClt = "Mrs.";

        else
            $titleClt = "Mr.";

        $nomClt = $titleClt . " " . $row['Prenom'] . $row['Nom'];
        
        $adresseClt = $row['Adresse'];
        $emailClt = $row['Email'];
        $dateCreation = $row['DateCreation'];
        $dateExpiration = $row['DateExpiration'];;
 
    }
    
  

  ?>



<div class = "container ">
    <ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item "><a href="">DEVIS</a></li>
            <li class="breadcrumb-item active">DV-<?php echo $id?></li>
    </ol>
    
</div>

    <!-- DEVIS -->
<div class="container" style="background:#66c9e0;margin-top: 120px;margin-bottom: 120px;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="..\..\media\IN.webp" height="100" width="100"  alt="Schiele maroc logo" >
                        </div>

                        <div class="col-md-6 mt-4 text-end">
                            <p class="font-weight-bold mb-1">DEVIS NUM <?php echo $id?></p>
                            <p class="text-muted"><?php echo $dateCreation?></p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <!-- CLIENT DETAILS -->

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1"><?php echo $nomClt?></p>
                            <p>Acme Inc</p>
                            <p class="mb-1"><?php echo $adresseClt?></p>
                            <p class="mb-1"><?php echo $emailClt?></p>
                        </div>

                    <!-- PAYMENT DETAILS -->

                        <div class="col-md-6 text-end">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                            <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                            <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                            <p class="mb-1"><span class="text-muted">Name: </span> John Doe</p>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <?php 

                                    $sqlArt = "SELECT a.idArticle, a.NomArticle, a.Description, a.Prix, d.quantite FROM articles AS a LEFT JOIN dvs_article AS d ON a.IdArticle=d.idArticle WHERE d.NumDevis = $id";
                                    $resultArt = mysqli_query($conn,$sqlArt);
                                    while ($rowArt = mysqli_fetch_assoc($resultArt)){
                                        
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo @$rowArt['idArticle']?></td>
                                        <td><?php echo @$rowArt['NomArticle']?></td>
                                        <td><?php echo @$rowArt['Description']?></td>
                                        <td><?php echo @$rowArt['quantite']?></td>
                                        <td><?php echo @$rowArt['Prix']?></td>

                                        <td><?php echo ($rowArt['Prix'] * $rowArt['quantite'])?></td>
                                    </tr>
                                            
                                    <?php 
                                        #Calculating the total invoice price 
                                            $totalePrix += ($rowArt['Prix'] * $rowArt['quantite']);
                                        }
		                                $conn->close();
		                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light"><?php echo $totalePrix ?></div>
                        </div>

                

          
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-light mt-2 mb-2 text-end me-3 small">
        <button class="btn btn-dark">Modifier</button>
        <button class="btn btn-dark">Exporter</button>
    </div>
</div>

<?php include '../Include/foot.php'; ?>


