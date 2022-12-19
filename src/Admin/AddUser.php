<!-- INCLUDING NECESSARY FILES  -->
<?php


  include '../Include/head.php'; 
  include '../Include/nav.php';
  include '../../db/conn.php';
  include("../Admin/Check_If_Admin.php");
  
  ?>

<!-- LOGIN LOGIC -->
<?php 

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

  echo "<br>sexe : " . $sexe;
    echo "<br>role: " . $user_type;
  if(empty($email)){
    header("Location: AddUser.php ? error = email required!");
    exit();
  }
  else if(empty($password) || empty($cpassword)){
    header("Location: AddUser.php ? error = password required with confirmation!");
    exit();
  }

  if(empty($nom)){
    header("Location: AddUser.php ? error = name required!");
    exit();
  }
  else if(empty($sexe)){
    header("Location: AddUser.php ? error = sexe required!");
    exit();
  }
  
  // CHECK IF USER IS ADMIN 
  if($user_type == "admin")
    $user_type = true;
  else
    $user_type = false;

  echo "<br>role: " . $user_type;

  echo "<br> vartype sexe : " . gettype($sexe) ;
  echo "<br>vartype role: " . gettype($user_type) ;


  $sql = "SELECT * FROM commercial WHERE Email = '$email' AND Password = '$password'";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){

     $error[] = 'user already exist!';

  }else{

     if($password != $cpassword){
        $error[] = 'password not matched!';
     }else{
        $insert = "INSERT INTO commercial(Nom, Prenom, Email, Admin,Sexe,Password) VALUES('$nom','$prenom','$email',1,'Male','$password')";
        mysqli_query($conn, $insert);
        header('location: ../Commun/home.php');
     }
  }



}



?>





<!-- ADD USER FORM -->


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-sm-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-sm-10 col-sm-6 col-sm-5 order-2 order-sm-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ajouter Utilisateur</p>

                <form class="mx-1 mx-md-4" action="" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="nom" id="nom" class="form-control" />
                      <label class="form-label" for="nom">Nom </label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="prenom" id="prenom" class="form-control" />
                      <label class="form-label" for="prenom">Prenom </label>
                    </div>
                  </div>

     
                  <!-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="Homme" checked>
                    <label class="form-check-label" for="inlineRadio1">Homme</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="FEMME">
                    <label class="form-check-label" for="inlineRadio2">FEMME</label>
                  </div> -->

                  <select name="sexe">
                    <option value="Male">Homme</option>
                    <option value="Female">Femme</option>
                  </select>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" id="email" class="form-control" />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" id="password" class="form-control" />
                      <label class="form-label" for="password">Mot de passe</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="cpassword" id="cpassword" class="form-control" />
                      <label class="form-label" for="cpassword">Repeter le Mot de passe</label>
                    </div>
                  </div>



                  <select name="user_type">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                  </select>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">confirmer</button>
                  </div>

                </form>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php include '../Include/foot.php'; ?>