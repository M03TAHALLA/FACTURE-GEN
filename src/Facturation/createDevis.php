<!-- INCLUDING NECESSARY FILES  -->
<?php
  include '../Include/head.php'; 
  include '../Include/nav.php';
  include '../../db/conn.php';
  include("../Authentification/Check_if_Logged_In.php"); 
  include("..\Include\getClients.php") ;
  include("..\Include\getArticles.php") ;

  $id = "";
  $IdClient= "";
  $DateCreation= "";
  $DateExpiration= "";
  $TotalePrix= 0.0;
  $nomClient = "";
  if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET['id'])){
        header("location: ../AffichageListes/Show_Devises_Liste.php");
        exit();
    }
    
    // GETTING THE ID FROM THE GET REQUEST
    $id = $_GET['id'];

    // READ THE DATA FROM DB BY ID

    $sql = "SELECT * FROM fichdevis WHERE NumDevis = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row){
        header("location: ../AffichageListes/Show_Devises_Liste.php");
        exit();
    }
  }
  else{

    // POST METHOD --> UPDATE THE DATA
    $id = $_POST['id'];
    $nomClient = $_POST['client'];

    $sql = "SELECT * FROM fichdevis WHERE NumDevis = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if(!$row){

        // CLIENT COLUMN
        $sql = "SELECT IdClient FROM client WHERE Nom='{$_POST['client']}'";
        $result = mysqli_query($conn,$sql);
        $IdClient = mysqli_fetch_assoc($result);
 

        $DateCreation= date("y-m-d") ;
        $DateExpiration= strtotime(date("Y-m-d", strtotime($DateCreation)) . " +1 day"); ;
        $sql = "INSERT INTO fichdevis(NumDevis,DateCreation, DateExpiration, IdClient) VALUES('$id','$DateCreation', '$DateExpiration', '{$IdClient['IdClient']}');";
        $result = mysqli_query($conn,$sql);

    }
 
    if(isset($_POST['addArticle'])){
        $sql = "SELECT idArticle FROM articles WHERE NomArticle='{$_POST['article']}'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "INSERT INTO dvs_article(NumDevis, idArticle) VALUES('$id','{$row["idArticle"]}')";
        $result = mysqli_query($conn,$sql);
    }
    else if(isset($_POST['submit'])){
        header("location: ../AffichageListes/Show_Devises_Liste.php");
        exit();
    }




    
    // $Articles = array();
    // foreach($Articles as $art){
    //     $TotalePrix= $art["Prix"];
    // }
    


  }


?>

</head>
  <body>
  <form autocomplete="off" method="post" action="">
    <div>
        <!-- HIDDEN INPUT TO STOCK ID -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
    <div id="selectClient">
    <label for="client" class="form-label">Nom Client</label>
    <input value="<?php echo $nomClient; ?>" class="form-label" type="text" name="client" id="client" onKeyUp="showResults(this.value,'clients')" required/>
    <div id="result_client"></div>
    </div>

    <div id="selectArticles">
    <label for="article" class="form-label">Nom Article</label>
    <input class="form-label" type="text" name="article" id="article" onKeyUp="showResults(this.value,'articles')" />
    <button type="submit" name="addArticle">Ajouter article</button>
    <div id="result_article"></div>
    </div>
    <div class = "container ">
    
    <ol class="breadcrumb   my-4 ">
  
        <li class="breadcrumb-item active">ARTICLES</li>
    </ol>
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
            <!-- <td><?php //echo @$rowArt['quantite']?></td> -->
            <td><?php echo @$rowArt['Prix']?></td>

            <!-- <td><?php //echo ($rowArt['Prix'] * $rowArt['quantite'])?></td> -->
        </tr>
                
        <?php 
            #Calculating the total invoice price 
                // $totalePrix += ($rowArt['Prix'] * $rowArt['quantite']);
            }
            // $conn->close();
        ?>
           </tbody>
                            </table>
    </div>

    <div>
    <button type="reset" name="cancel">cancel</button>
    <button type="submit" name="submit">confirmer</button>
    </div>
    </form>


  <?php 
  include '../Facturation/autoComplete.php';
  include '../Include/foot.php';
   ?>
