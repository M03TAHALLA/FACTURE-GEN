

<!-- INCLUDING NECESSARY FILES  -->
<?php 
  include '../Include/head.php'; 
  include '../Include/nav.php';
  include '../../db/conn.php';
  ?>


<!-- CHECK IF ALREADY LOGGED IN -->

<?php 
  if(isset($_SESSION['IdCommercial'])){
    header('location: logout.php');
 }
?>

<!-- LOGIN LOGIC -->
<?php 
  $error[]='';

if(isset($_POST['submit'])){
  if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }

  $email = validate($_POST['email']);
  $password = validate($_POST['password']);

  if(empty($email)){
    header("Location: login.php ? error = email required!");
    exit();
  }
  else if(empty($password)){
    header("Location: login.php ? error = password required!");
    exit();
  }

  $sql = "SELECT * FROM commercial WHERE Email = '$email' AND Password = '$password'";

  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['Email'] === $email && $row['Password'] === $password){
      echo "Logged in!";
      $_SESSION['IdCommercial'] = $row['IdCommercial'];
      $_SESSION['Nom'] = $row['Nom'];
      $_SESSION['Prenom'] = $row['Prenom'];
      $_SESSION['Role'] = $row['Role'];
      $_SESSION['Sexe'] = $row['Sexe'];
      $_SESSION['Email'] = $row['Email'];
      $_SESSION['Password'] = $row['Password'];
      header("Location: ../Commun/home.php");
      exit();
    }
    else{
      $error[] = "Email ou Mot de passe Incorrecte!!";
      exit();
    }
  }
  else{
    header("Location: login.php");
      
    exit();
  }
}
?>

<section class="vh-100 bg-secondary" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="..\..\media\person-working-at-desk-in-vintage-90-s-style-office.webp"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div> -->
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="post">
                  
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <img src="..\..\media\INv.webp" width="60" height="60"  class="rounded  bg-dark " alt="">
                    <span class="h1 fw-bold mb-0  ps-2">IN-VOICER</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                    
                  <?php
                    if(isset($error)){
                      foreach($error as $error){
                          echo '<span class="error-msg">'.$error.'</span>';
                      };
                    };
                    ?>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name="submit" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  
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
