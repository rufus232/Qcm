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
    <title>Rufus QCM</title>
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
<h1 class="titre">QCM</h1>
</div>

<form action="reponseQcm.php" method="post">
<?php
include "connect.php";
$req = "select * from questions order by rand() limit 10";
$res = mysqli_query($id, $req);
$i = 1;
while($ligne = mysqli_fetch_assoc($res)){
    echo "<h3>$i : ".$ligne["libelleQ"]."</h3>";
    $idq = $ligne["idq"];
    $req2 = "select * from reponses where idq=$idq";
    $res2 = mysqli_query($id, $req2);
    while($ligne2 = mysqli_fetch_assoc($res2)){
        $idr = $ligne2["idr"];
        echo "<input type='radio' name='$idq' value='$idr'> ".$ligne2["libeller"]."<br>";
    }
    $i++;
}
?>
<input class="button" type="submit" value="Verifier">
</form>

</body>
</html>