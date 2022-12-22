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

  // STARTING A SESSION
if(isset($_POST['submit'])){

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  

    $Nom = validate($_POST['Nom']);
    $Email = validate($_POST['Email']);
    $Sexe = validate($_POST['Sexe']);
    $Adresse = validate($_POST['Adresse']);


do{
// CHECK IF FIELDS ARE EMPTY
  if(empty($Nom) ||empty($Email) || empty($Sexe) || empty($Adresse)){
    $error = "All fields required!";
    break;
  }   

  // CREATE SQL QUERY
  $sql = "SELECT * FROM client WHERE Email = '$Email'";

  // EXECUTE SQL QUERY
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){

     $error = 'user already exist!';
     break;

  }else{
  

    $insert = "INSERT INTO client(Nom, Email, Sexe, Adresse) VALUES('$Nom','$Email','$Sexe','$Adresse')";
    mysqli_query($conn, $insert);
    $success = "Client ajouté avec succèes !";
    header('location: ../AffichageListes/Show_Client_Liste.php');
    exit();
}

}

while(false);

}

?>





<!-- ADD USER FORM -->




                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ajouter Client</p>
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



