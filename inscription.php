<?php
session_start();
$_session['user']="";
require_once('includes/function.php');
/**************************
Index.php
Inscription du questionnaire Kolb -> input information utilisateur

20/12/13
*************************/


/**************************************************************************** 
****************************************************************************

A faire ->  travail perso -> design et améliorations -> synthaxe foundation           
            
            

****************************************************************************
****************************************************************************/

if(isset($_POST["user_nom"]))
{    
    list($jour, $mois, $annee) = explode('/',$_POST['user_date_naissance']);

    $_SESSION['user']['name'] = secInput($_POST["user_nom"]);
    $_SESSION['user']['prenom'] = secInput($_POST['user_prenom']);
    //$_SESSION['user']['date_naissance'] = date("d/m/Y", $_POST['user_date_naissance']);
    $_SESSION['user']['date_naissance'] = mktime(0, 0, 0, $mois, $jour, $annee);
    $_SESSION['user']['formation'] = secInput($_POST['user_formation']);
   
    header("Location:questionaire.php");
}

?>

  <?php require_once('includes/header.php'); ?>

         <h1>Évaluation Kolb</h1>
              <p>Nous aurions juste besoin de quelques renseignements sur vous, avant de démarrer le test composé de 9 questions, qui permetra d'établir votre profil apprenant.</p>
                <form name="email-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                  <div>
                    <div>
                      <div>
                        <label class="label" for="user_nom">Nom:</label>
                        <input class="w-input input" id="input-nom" type="text" placeholder="Entrez votre nom" name="user_nom" required="required" autofocus="autofocus"></input>
                      </div>
                      <div>
                        <label class="label" for="user_date_naissance">Date de naissance:</label>
                        <input class="w-input input" id="input-date-naissance" type="text" placeholder="__ / __ / ____" name="user_date_naissance" required="required"></input>
                      </div>
                    </div>
                    <div>
                      <div>
                        <label class="label" for="user_prenom">Prénom</label>
                        <input class="w-input input" id="input-prenom" type="text" placeholder="Entrez votre prénom" name="user_prenom" required="required"></input>
                      </div>
                      <div>
                        <label class="label" for="user_formation">Formation</label>
                        <select class="w-select select-field" id="select-formation" name="user_formation" required="required" data-name="formation">
                          <option value="0">Bac</option>
                          <option value="1">Bac +1</option>
                          <option value="2">bac +2</option>
                          <option value="3">bac +3</option>
                          <option value="4">bac +4</option>
                          <option value="5">bac +5</option>
                          <option value="6">Autre</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Questionaire"></input>
                </form>
              </div>
            </div>
          </div>

    
<?php require_once('includes/footer.php'); ?>