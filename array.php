<?php
session_start();
include "connect.php";
if(!isset($_SESSION["name"])){
    header("location:connexion.php");
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="array.css">
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Rufus QCM</title>
</head>
<body>
<header>
    <i class="fa-solid fa-user">  <?php echo $_SESSION["name"];?> </i>
    <div class="icon">
        <a href="array.php">
        <i class="fa-sharp fa-solid fa-layer-group"> Array </i>
        </a>
        <a href="qcm.php">
            <i class="fa-solid fa-house" > Home </i>
        </a>
        <a href="deconnexion.php">
            <i class="fa-solid fa-arrow-right-from-bracket">     Deconnexion</i>
        </a>
   
    </div>
    </header>
<div class="title">
<h1 class="titre">Array</h1>
</div>

<form>

    <div class="headers">
        <h3>Nom</h3>
        <h3>Note</h3>
        <h3>Date</h3>        
    </div>

    <div class="messages">
                <ul>
                    <?php
                    
                    $requete = "select * from tableau";
                    $resultat = mysqli_query($id, $requete);
                    while($ligne = mysqli_fetch_assoc($resultat)){//va nous retourner toutes les lignes de notre bdd dans une boucle                
                    ?>

                    <li class="header"><span><?=$ligne["name"]?> </span> <span> <?=$ligne["note"]?>   </span><span> <?=$ligne["date"]?></span></li>
                    
                <?php } ?>
                </ul>
                
            </div>    

</form>

</body>
</html>