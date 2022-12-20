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
$email = "";
$password = "";
$cpassword = "";
$nom = "";
$sexe ="";
$user_type = "";
$prenom = "";
  // STARTING A SESSION
if(isset($_POST['submit'])){

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  

  $email = validate($_POST['email']);
  $password = validate($_POST['password']);
  $cpassword = validate($_POST['cpassword']);
  $nom = validate($_POST['nom']);
  $sexe = validate($_POST['sexe']);
  $user_type = validate($_POST['user_type']);
  $prenom = validate($_POST['prenom']);

do{
// CHECK IF FIELDS ARE EMPTY
  if(empty($email) ||empty($password) || empty($cpassword) ||empty($nom) ||empty($sexe) ||empty($user_type) || empty($prenom) ){
    $error = "All fields required!";
    break;
  }   
  
  // CHECK IF USER IS ADMIN 
  if($user_type == "admin")
    $user_type = true;
  else
    $user_type = false;

    // CREATE SQL QUERY
  $sql = "SELECT * FROM commercial WHERE Email = '$email' AND Password = '$password'";

  // EXECUTE SQL QUERY
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){

     $error = 'user already exist!';
     break;

  }else{

     if($password != $cpassword){
        $error = 'password not matched!';
        break;

     }else{
        $insert = "INSERT INTO commercial(Nom, Prenom, Email, Admin,Sexe,Password) VALUES('$nom','$prenom','$email',1,'Male','$password')";
        mysqli_query($conn, $insert);
        $success = "Utilisateur ajouté avec succèes !";
        header('location: ../AffichageListes/Show_Commercial_Liste.php');
        exit();
     }
  }

}
while(false);

}

?>





<!-- ADD USER FORM -->




                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ajouter Utilisateur</p>
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
                      <input type="text" name="nom" id="nom" class="form-control"  value="<?php echo $nom; ?>"/>
                      <label class="form-label" for="nom">Nom </label>
                    </div>
                  </div>

                  <div class=" flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom; ?>" />
                      <label class="form-label" for="prenom">Prenom </label>
                    </div>
                  </div>

    
                  <div class=" flex-row align-items-center mb-4">
                  
                    <div class="form-outline  mb-0">
                  <select name="sexe" class="form-select  " style="width:auto;">
                    <option value="Male" <?php if($sexe == "Male") echo "selected"; ?> >Homme</option>
                    <option value="Female" <?php if($sexe == "Female") echo "selected"; ?>>Femme</option>
                  </select>
                  <label class="form-label" for="sexe">Sexe </label>
                  </div>
                  </div>


                  <div class=" flex-row align-items-center mb-4">
                    <div class="form-outline  mb-0">
                      <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

                  <div class=" flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="password" name="password" id="password" class="form-control" />
                      <label class="form-label" for="password">Mot de passe</label>
                    </div>
                  </div>

                  <div class=" flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="password" name="cpassword" id="cpassword" class="form-control" />
                      <label class="form-label" for="cpassword">Repeter le Mot de passe</label>
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
                  <div class=" flex-row align-items-center mb-4">
                  
                    <div class="form-outline  mb-0">
                  <select name="user_type" class="form-select" style="width:auto;">
                    <option value="user" <?php if($user_type == false) echo "selected"; ?>>user</option>
                    <option value="admin" <?php if($user_type == true) echo "selected"; ?>>admin</option>
                  </select>
                  <label class="form-label" for="user_type">Role </label>
                  </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">confirmer</button>
                  </div>

                </form>


</div>
<?php include '../Include/foot.php'; ?>



