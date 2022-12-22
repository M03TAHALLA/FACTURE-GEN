<!-- INCLUDING NECESSARY FILES  -->
<?php


  include '../Include/head.php'; 
  include '../Include/nav.php';
  include '../../db/conn.php';
  include("../Admin/Check_If_Admin.php");
  
  ?>

<!-- LOGIN LOGIC -->
<?php 
$error = "";
$success = "";
$Nom = "";
$Email = "";
$Sexe = "";
$Adresse = "";


if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if(!isset($_GET['id'])){
            header("location: ../AffichageListes/Show_Client_Liste.php");
            exit();
        }
        
        // GETTING THE ID FROM THE GET REQUEST
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM client WHERE IdClient = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(!$row){
            header("location: ../AffichageListes/Show_Client_Liste.php");
            exit();
        }

        $Nom = $row['Nom'];
        $Email = $row['Email'];
        $Sexe = $row['Sexe'];
        $Adresse = $row['Adresse'];

    }else{
        $id = $_POST['id'];
        $Nom = $_POST['Nom'];
        $Email = $_POST['Email'];
        $Sexe = $_POST['Sexe'];
        $Adresse = $_POST['Adresse'];
        do{
        // CHECK IF FIELDS ARE EMPTY
        if(empty($Nom) ||empty($Email) || empty($Sexe) || empty($Adresse)){
            $error = "All fields required!";
            break;
        }   

        

            $sql = "UPDATE  client SET Nom='$Nom', Email='$Email', Sexe='$Sexe', Adresse='$Adresse' WHERE IdClient = $id";

            $result = mysqli_query($conn, $sql);

            // CHECK IF QUERY EXECUTED

            if(!$result){
                $error = "invalid query" . $conn->connect_error;
                break;
            }

            $success = "Client Modifié avec succèes !";
            header('location: ../AffichageListes/Show_Client_Liste.php');
            exit();
        }

        

        while(false);

        }

?>





<!-- ADD USER FORM -->




                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Modifier Client</p>
                <div class="container   justify-content-center p-5" >
                <?php 
                    if(!empty($error)){
                      echo "

                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$error</strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>

                      ";
                    }
                  ?>
                <form  action="" method="post">

                 <!-- HIDDEN INPUT TO STOCK ID -->
                 <input type="hidden" name="id" value="<?php echo $id; ?>">
                 
                 
                  <div class=" flex-row align-items-center mb-4">
                    <div class="form-outline  mb-0">
                      <input type="text" name="Nom" id="Nom" class="form-control"  value="<?php echo $Nom; ?>"/>
                      <label class="form-label" for="Nom">Nom Client</label>
                    </div>
                  </div>


                  <div class=" flex-row align-items-center mb-4">
                    <div class="form-outline  mb-0">
                      <input type="text" name="Email" id="Email" class="form-control" value="<?php echo $Email; ?>" />
                      <label class="form-label" for="Email">Email</label>
                    </div>
                  </div>


                  <div class=" flex-row align-items-center mb-4">
                    <div class="form-outline  mb-0">
                      <input type="text" name="Adresse" id="Adresse" class="form-control" value="<?php echo $Adresse; ?>" />
                      <label class="form-label" for="Adresse">Adresse</label>
                    </div>
                  </div>

                  <div class=" flex-row align-items-center mb-4">
                  
                    <div class="form-outline  mb-0">
                  <select name="Sexe" class="form-select  " style="width:auto;">
                    <option value="Male" <?php if($Sexe == "Male") echo "selected"; ?> >Homme</option>
                    <option value="Female" <?php if($Sexe == "Female") echo "selected"; ?>>Femme</option>
                  </select>
                  <label class="form-label" for="Sexe">Sexe </label>
                  </div>
                  </div>


                  <?php 
                    if(!empty($success)){
                      echo "
                        <div class='row mb-3'>
                          <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$success</strong> You should check in on some of those fields below.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                          </div>
                        </div>
                      ";
                    }
                  ?>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">confirmer</button>
                  </div>

                </form>


</div>
<?php include '../Include/foot.php'; ?>



