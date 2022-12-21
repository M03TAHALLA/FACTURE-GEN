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
$NomArticle = "";
$Description = "";
$Prix = 0.0;

  // STARTING A SESSION
if(isset($_POST['submit'])){

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  

  $NomArticle = validate($_POST['NomArticle']);
  $Description = validate($_POST['Description']);
  $Prix = floatval(validate($_POST['Prix']));


do{
// CHECK IF FIELDS ARE EMPTY
  if(empty($Prix) ||empty($Description) || empty($NomArticle) ){
    $error = "All fields required!";
    break;
  }   
  

    $insert = "INSERT INTO articles(NomArticle, Description, Prix) VALUES('$NomArticle','$Description','$Prix')";
    mysqli_query($conn, $insert);
    $success = "Article ajouté avec succèes !";
    header('location: ../AffichageListes/Show_Articles_Liste.php');
    exit();
}



while(false);

}

?>





<!-- ADD USER FORM -->




                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ajouter Article</p>
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
                      <input type="text" name="NomArticle" id="NomArticle" class="form-control"  value="<?php echo $NomArticle; ?>"/>
                      <label class="form-label" for="NomArticle">Nom Article</label>
                    </div>
                  </div>

                <!-- Description  -->
                <div class="mb-3">
                   
                    <textarea class="form-control" id="Description" type="text" name="Description" placeholder="Description" style="height: 10rem;" data-sb-validations="required" value="<?php echo $Description; ?>"></textarea>
                    <label class="form-label" for="Description">Description</label>
                    <div class="invalid-feedback" data-sb-feedback="message:required">Un message est requis.</div>
                </div>

                  <div class=" flex-row align-items-center mb-4">
                    <div class="form-outline  mb-0">
                      <input type="text" name="Prix" id="Prix" class="form-control" value="<?php echo $Prix; ?>" />
                      <label class="form-label" for="Prix">Prix Article</label>
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



