<?php
session_start();
include "connect.php";


if (isset($_POST['sign'])) {
    $nom = $_POST["name"];
    $email = $_POST["email2"];
    $pass1 = $_POST["password2"];
    $pass2 = $_POST["password3"];
    if($pass1 == $pass2){

       $sql = "INSERT INTO `connexion`(`name`, `email`, `password`) VALUES ('$nom', '$email', '$pass1')";
        $stmt = $id->prepare($sql);
        $stmt->execute();
        
    }else{
        echo "Les mots de passe ne sont pas identique";
    }
}

if (isset($_POST['login']) && isset($_POST["email"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $requete = "SELECT `email`, `password`, `name` FROM `connexion` WHERE email='$email' and password = '$pass'";
    $resultat= mysqli_query($id, $requete);
    $data = mysqli_fetch_assoc($resultat);
   
    if(mysqli_num_rows($resultat)>0){
         $_SESSION["name"]= $data['name'];
        //  echo "<br> c'est mon nom ça marche ??".$_SESSION["name"];
        header("location:qcm.php");
    }else{
        $erreur = "Erreur de Pseudo ou de Mot de Passe !!! ";
    }
}

?>

<!-- FIN PHP-->

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Responsive Login and Signup Form </title>

        <!-- CSS -->
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
        
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="css/style.css">
                        
    </head>
    <body>
        
        <section class="containers forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>
                    <?= $error === true ? '<div class="alert alert-danger mt-2" data-bs-dismiss="alert" aria-label="Close" role="alert">  Email ou mot de passe incorrecte ! </div>' : '' ?>
                        

                    
                    <form action="" method="post">
                        <div class="field input-field">
                            <input type="email" placeholder="Email"  name= "email" class="input" >
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" name= "password"  class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="password_reset.php" class="forgot-pass">Forgot password?</a>
                        </div>

                        <div class="field button-field">
                            <button name="login">Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <!-- <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="images/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div> -->

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>Signup</header>
                    <form action="#" method="post">
                       
                    <div class="field input-field">
                            <input type="text" name="name" placeholder="Name" class="input">
                        </div>
                        <div class="field input-field">
                            <input type="email" name="email2" placeholder="Email" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password2"  placeholder="Create password" class="password">
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password3" placeholder="Confirm password" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button name="sign">Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                    </div>
                </div>

                <div class="line"></div>
<!-- 
                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="images/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div> -->

            </div>
        </section>

        <!-- JavaScript -->
        <script src="js/script.js"></script>
    </body>
</html>