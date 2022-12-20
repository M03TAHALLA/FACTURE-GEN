<!-- INCLUDING NECESSARY FILES  -->
<?php


  include '../Include/head.php'; 
  include '../Include/nav.php';
  include '../../db/conn.php';
  include("../Admin/Check_If_Admin.php");
  
  ?>

<?php 
    $id = "";
    $email = "";
    $password = "";
    $cpassword = "";
    $nom = "";
    $sexe = "";
    $user_type = "";
    $prenom = "";
    $error = "";
    $success = "";
    // CHECKING IF WE GOT A GET REQUEST
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        

        if(!isset($_GET['id'])){
            header("location: ../AffichageListes/Show_Commercial_Liste.php");
            exit();
        }
        
        // GETTING THE ID FROM THE GET REQUEST
        $id = $_GET['id'];

        // READ THE DATA FROM DB BY ID

        $sql = "SELECT * FROM commercial WHERE IdCommercial = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(!$row){
            header("location: ../AffichageListes/Show_Commercial_Liste.php");
            exit();
        }
        $email = $row['Email'];
        $password = $row['Password'];
        $nom = $row['Nom'];;
        $sexe = $row['Sexe'];
        $user_type = $row['Admin'];;
        $prenom = $row['Prenom'];
 
    }
    else{
        // POST METHOD --> UPDATE THE DATA
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $sexe = $_POST['sexe'];
        $user_type = $_POST['user_type'];
        $prenom = $_POST['prenom'];

        

        do{
            if(empty($email) ||empty($password) ||empty($nom) ||empty($sexe) ||empty($user_type) || empty($prenom) ){
                $error = "All fields required!";
                break;
            }   
              // CHECK IF USER IS ADMIN 
                if($user_type == "admin")
                $user_type = true;
                else
                $user_type = false;

            // EXECUTE QUERY
            $sql = "UPDATE commercial SET Email='$email', Password='$password', Nom='$nom', Sexe='$sexe', Admin='$user_type', Prenom='$prenom' WHERE IdCommercial='$id';";

            

            $result = mysqli_query($conn,$sql);
            // CHECK IF QUERY EXECUTED

            if(!$result){
                $error = "invalid query" . $conn->connect_error;
                break;
            }

            $success = "Utilisateur Modifié avec succèes !";
            header("location: ../AffichageListes/Show_Commercial_Liste.php");
            exit();
        }
        while(false);
    }
?>


<!-- ADD USER FORM -->

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Modifier L'Utilisateur</p>
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
                <div class="container   justify-content-center p-5" >
                <form action="" method="post">
                    <!-- HIDDEN INPUT TO STOCK ID -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>" />
                      <label class="form-label" for="nom">Nom </label>
                    </div>
                  </div>

                  <div class=" flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom; ?>" />
                      <label class="form-label" for="prenom">Prenom </label>
                    </div>
                  </div>


                  <select name="sexe" >
                    <option value="Male"<?php if($sexe == "Male") echo "selected"; ?>>Homme</option>
                    <option value="Female"<?php if($sexe == "Female") echo "selected"; ?>>Femme</option>
                  </select>


                  <div class=" flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

                  <div class=" flex-row align-items-center mb-4">
                    
                    <div class="form-outline  mb-0">
                      <input type="password" name="password" id="password" class="form-control" value="<?php echo $password; ?>" />
                      <label class="form-label" for="password">Mot de passe</label>
                    </div>
                  </div>


                  <select name="user_type" >
                    <option value="user" <?php if($user_type == false) echo "selected"; ?>>user</option>
                    <option value="admin" <?php if($user_type == true) echo "selected"; ?>>admin</option>
                  </select>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">confirmer</button>
                  </div>

                </form>


</div>
<!-- ADD USER FORM -->


<?php include '../Include/foot.php'; ?>