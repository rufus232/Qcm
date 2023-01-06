const forms = document.querySelector(".forms"),
      pwShowHide = document.querySelectorAll(".eye-icon"),
      links = document.querySelectorAll(".link");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
        
        pwFields.forEach(password => {
            if(password.type === "password"){
                password.type = "text";
                eyeIcon.classList.replace("bx-hide", "bx-show");
                return;
            }
            password.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        })
        
    })
})      

links.forEach(link => {
    link.addEventListener("click", e => {
       e.preventDefault(); //preventing form submit
       forms.classList.toggle("show-signup");
    })
})

<div class="messages">
            <ul>
                <?php
                
                $requete = "select * from tableau";
                $resultat = mysqli_query($id, $requete);
                while($ligne = mysqli_fetch_assoc($resultat)){//va nous retourner toutes les lignes de notre bdd dans une boucle                
                ?>

                <li class="message"><?=$ligne["id"]?> - <span><?=$ligne["name"]?>: </span> <?=$ligne["note"]?>   </span> <?=$ligne["date"]?></li>
               <?php } ?>
            </ul>
            
        </div>