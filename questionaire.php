<?php
session_start();
require('includes/function.php');
/**************************
/* Questionnaire.php
/* Questionnaire KOlb
/* 20/12/13
*************************/
/**************************
Plan :
-> Gestion numéro des questions
-> Page html questions
*************************/

$monTabUsers = $_SESSION['user']; 

/**************************************************************************** 
Test de soumission de a question et incrémentation du numéro de la question
****************************************************************************/
    
    $question_number = 1;
    
    $questions = array(
        1 => array("diff&eacute;rencier", "essayer", "s'impliquer", "&ecirc;tre pratique"),
        2 => array("r&eacute;ceptif", "logique", "m&eacute;thodique", "impartial"),
        3 => array("ressentir", "faire attention", "réfléchir", "faire"),
        4 => array("accepter", "prendre des risques", "&eacute;valuer", "prendre conscience"),
        5 => array("intuitif", "productif", "logique", "interrogateur"),
        6 => array("abstrait", "observateur", "concret", "actif"),
        7 => array("orient&eacute; vers le pr&eacute;sent", "r&eacute;flichissant", "orienté vers le futur", "pragmatique"),
        8 => array("partir de son exp&eacute;rience", "observer", "penser", "exp&eacute;rimenter"),
        9 => array("intense", "r&eacute;serv&eacute;", "rationel", "responsable")
    ); 
    
   if(isset($_POST['question_submit'])) // test de la soumission de la question en cours
   { 
        $_SESSION['questions'][$_POST['question_number']] = array($_POST['select-choix-1'],$_POST['select-choix-2'],$_POST['select-choix-3'],$_POST['select-choix-4']);
        
        if(compareEquality($_POST['select-choix-1'],$_POST['select-choix-2'],$_POST['select-choix-3'],$_POST['select-choix-4']))
        {
            $question_number = $_POST['question_number'];
            echo "Vous devez s&eacute;lectionner des valeurs diff&eacute;rentes";
        }
        else
        {
            if($_POST['question_number'] == 9)
            {
                header('Location:resultat.php');
            }
            $question_number = $_POST['question_number'] + 1; // incrémentation de la question
        }
    }

?>

<?php require_once('includes/header.php'); ?>
        
    <div class="row panel">
        <div class="small-10 small-centered large-uncentered columns">
             <h2>&Eacute;valuation Kolb</h2>
        </div>

        <div class="small-10 small-centered large-uncentered columns">
           <p>Il vous reste encore <?= (10 - $question_number); ?> question<?php if($question_number === 9) { echo''; } else { echo 's'; } ?> &agrave; remplir, avant de conna&icirc;tre votre profil d'apprenant</p>
        </div>
    </div>
    
    <div class="row panel">          
    <form name="email-form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?etat=2">
            
        <input type="hidden" name="question_number" value="<?= $question_number;?>" />
        
        <div class="row">
            <div class="small-10 small-centered large-uncentered columns">
                <label class="label" for="select-choix-1"><?= $questions[$question_number][0];  ?></label>
                <select class="w-select select-score" id="select-choix-1" name="select-choix-1" required="required">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
            </div>
        </div>
            
        <div class="row">
            <div class="small-10 small-centered large-uncentered columns">  
                <label class="label" for="select-choix-2"><?= $questions[$question_number][1] ; ?></label>
                <select class="w-select select-score" id="select-choix-2" name="select-choix-2" required="required">
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
        </div>

        <div class="row">
            <div class="small-10 small-centered large-uncentered columns">
                <label class="label" for="select-choix-3"><?= $questions[$question_number][2]; ?></label>
                <select class="w-select select-score" id="select-choix-3" name="select-choix-3" required="required">
                  <option value="3">3</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="4">4</option>
                </select>
             </div>
        </div>
            
        <div class="row">
            <div class="small-10 small-centered large-uncentered columns">  
                <label class="label" for="select-choix-4"><?= $questions[$question_number][3]; ?></label>
                <select class="w-select select-score" id="select-choix-4" name="select-choix-4" required="required">
                  <option value="4">4</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="large-12 columns">
              <input name="question_submit" type="submit" class="button small" value="<?php 
                        if($question_number == 9) { 
                            echo "Resultat"; 
                        } 
                        else { 
                            echo "Question ";
                            echo $question_number + 1; 
                        } ?>" />
            </div>
        </div>

    </form>
    </div>

<?php require_once('includes/footer.php'); ?>