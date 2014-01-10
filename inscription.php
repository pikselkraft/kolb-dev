<?php
session_start();
$_session['user']="";
require_once('includes/function.php');
/**************************
Index.php

Inscription du questionnaire Kolb -> input information utilisateur

20/12/13
*************************/

/**************************
Plan :
-> Test Post et redirection questionaire
-> Page html formulaire
*************************/

if(isset($_POST["user_nom"]))
{    
    list($jour, $mois, $annee) = explode('/',$_POST['user_date_naissance']);

    $_SESSION['user']['name'] = secInput($_POST["user_nom"]);
    $_SESSION['user']['prenom'] = secInput($_POST['user_prenom']);
    $_SESSION['user']['date_naissance'] = mktime(0, 0, 0, $mois, $jour, $annee);
    $_SESSION['user']['formation'] = secInput($_POST['user_formation']);
   
    header("Location:questionaire.php");
}

?>

  <?php require_once('includes/header.php'); ?>
    
    <div class="row">
        
        <div class="small-10 small-centered large-uncentered columns">
             <h2>Évaluation Kolb</h2>
        </div>

        <div class="small-10 small-centered large-uncentered columns">
            <p>Description Test Kolb, ut sed pulvinar tellus. Pellentesque mollis lacinia lacinia. Donec ut turpis hendrerit, congue lectus ut, consequat elit. Vestibulum venenatis malesuada ornare. Nunc eget metus pellentesque, rhoncus libero et, ultricies tortor.</p>
        </div>
   
    </div>
                         
    <form name="email-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        
        <div class="row">
            <div class="large-6 columns">
                <label class="label" for="user_nom">Nom:</label>
                <input class="w-input input" id="input-nom" type="text" placeholder="Entrez votre nom" name="user_nom" required="required" autofocus="autofocus">
            </div>
            
            <div class="large-6 columns">
                <label class="label" for="user_prenom">Prénom</label>
                <input class="w-input input" id="input-prenom" type="text" placeholder="Entrez votre prénom" name="user_prenom" required="required">
             </div>
        </div> 
        
        <div class="row">
             <div class="large-12 columns">
                <label class="label" for="user_date_naissance">Date de naissance:</label>
                <input class="w-input input" id="input-date-naissance" type="text" placeholder="__ / __ / ____" name="user_date_naissance" required="required">
            </div>
        </div>
        
        <div class="row">
            <div class="large-12 columns">
                <label class="label" for="user_formation">Formation</label>
                <select class="w-select select-field" id="select-formation" name="user_formation" required="required" data-name="formation">
                  <option value="0">Bac</option>
                  <option value="1">Bac +1</option>
                  <option value="2">bac +2</option>
                  <option value="3">bac +3</option>
                  <option value="4">bac +4</option>
                  <option value="5">bac +5</option>
                  <option value="6">Supérieur</option>
                  <option value="7">Autres</option>
                </select>
            </div>
         </div>
         
         <div class="row">
            <div class="large-12 columns">
                <input type="submit" value="Questionaire" class="button">
            </div>
         </div>
         
    </form>


    
<?php require_once('includes/footer.php'); ?>