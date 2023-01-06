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
    <link rel="stylesheet" href="style.css">
        <!-- Font Awesome -->
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>rufus QCM</title>
</head>
<body>
<header>
    <i class="fa-solid fa-user">  <?php echo $_SESSION["name"];?> </i>
    <div class="icon">
    <?php if($_SESSION["name"]=="Administrateur"){?>
            <a href="array.php">
            <i class="fa-sharp fa-solid fa-layer-group"> Array </i>
            </a>
        <?php } ?>  
        <a href="qcm.php">
            <i class="fa-solid fa-house" > Home </i>
        </a>
        <a href="deconnexion.php">
            <i class="fa-solid fa-arrow-right-from-bracket">     Deconnexion</i>
        </a>
   
    </div>
    </header>
<div class="title">
<h1 class="titre">Reponses QCM</h1>
</div>

<form action=""> 
    <?php
        include "connect.php";
        $note = 0;
        foreach($_POST as $idq => $idr){
            $reqQuest = "select libelleQ from questions where idq = $idq";
            $resQuest = mysqli_query($id, $reqQuest);
            $ligneQuest = mysqli_fetch_assoc($resQuest);
            $question = $ligneQuest['libelleQ'];

            $reqRpnses = "select * from reponses where idq = $idq";
            $resRpnses = mysqli_query($id, $reqRpnses);
            $ligneRpnses = mysqli_fetch_all($resRpnses);

            echo "<h3><br>$question<br></h3>";
                foreach ($ligneRpnses as $reponse) {
                    if($reponse[3] == 1){
                        if($idr == $reponse[0]){
                            $note += 2;
                            echo "<i class='fa-solid fa-check'></i><span class='isTrue'>true: $reponse[2] --Votre réponse</span><br>";
                        }else{
                            echo "<i class='fa-solid fa-check'></i><span>true: $reponse[2]</span><br>";
                        }
                    }else{
                        if($idr == $reponse[0]){
                            echo "<i class='fa-solid fa-xmark'></i><span class='isFalse'>false: $reponse[2] --Votre réponse</span><br>";
                        }else{
                            echo "<i class='fa-solid fa-xmark'></i><span>false: $reponse[2]</span><br>";
                        }
                    }
                }
        }
        echo "<br><b>Total de points : $note / 20 </b>";

        $nom = $_SESSION["name"];
        $sql = "INSERT INTO `tableau`(`name`, `note`, `date`) VALUES ('$nom', '$note', now())";
        $stmt = $id->prepare($sql);
        $stmt->execute();

    ?>
</form> 
</body>
</html>