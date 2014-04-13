<?php
session_start();
require_once('includes/function.php');
require_once('includes/connexion.php');

/**************************
/* resultat.php
/* page de résultat du questionnaire KOlb
/* 20/12/13
*************************/
/**************************
Plan :
-> Stockage des questions et calcul du profil
-> Page html résultat
*************************/


$monTabQuestion = $_SESSION['questions'];
$monTabUsers = $_SESSION['user'];


$ec= $_SESSION['questions']['2']['0'] + $_SESSION['questions']['3']['0'] + $_SESSION['questions']['4']['0'] + $_SESSION['questions']['5']['0'] + $_SESSION['questions']['6']['0'] + $_SESSION['questions']['7']['0'];

$oc= $_SESSION['questions']['1']['1'] + $_SESSION['questions']['3']['1'] + $_SESSION['questions']['6']['1'] + $_SESSION['questions']['7']['1'] + $_SESSION['questions']['8']['1'] + $_SESSION['questions']['9']['1'];

$ca= $_SESSION['questions']['2']['2'] + $_SESSION['questions']['3']['2'] + $_SESSION['questions']['4']['2'] + $_SESSION['questions']['5']['2'] + $_SESSION['questions']['8']['2'] + $_SESSION['questions']['9']['2'];

$ea= $_SESSION['questions']['1']['3'] + $_SESSION['questions']['3']['3'] + $_SESSION['questions']['6']['3'] + $_SESSION['questions']['7']['3'] + $_SESSION['questions']['8']['3'] + $_SESSION['questions']['9']['3'];

//echo "<br /> EC :". $ec; // debug
//echo "<br /> OR :". $oc;
//echo "<br /> CA :". $ca;
//echo "<br /> EA :". $ea;

$y = $ca - $ec; 
$x = $ea - $oc; 

//echo "<br /> ca_ec y : " . $y; // debug
//echo "<br /> ea_or x : " . $x;

echo "<br />"; 
if($x >= 3 && $x <= 17 && $y <= 2 && $y >= -12)
{
    $profil="Accomodateur";
}
    else if($x <= 2 && $x >= -15 && $y <= 2 && $y >= -12)
    {
        $profil="Divergent"; 
    } 
        else if($x >= 3 && $x <= 17 && $y >= 3 && $y <= 18)
        {
            $profil="Convergent";
        }
            else if($x <= 2 && $x >= -15 && $y >= 3 && $y <= 18)
            {
                $profil="Assimilateur";
            }
else {echo"L'application rencontre un problème technique, veuillez nous excuser";}


/**************************************************************************** 
Affichage dynamique profil dominant
****************************************************************************/
$profilDescription = array(
    'ec' => array("Cela correspond à une approche de l’apprentissage basée sur la réceptivité et l’expérience, ce qui dépend essentiellement de jugements inspirés par le sentiment. Des sujets à score élevé en EC ont tendance à être empathiques et orientés vers les autres. Ils trouvent en général que les apports théoriques sont sans utilité et préfèrent traiter chaque situation comme un cas unique. Ils apprennent mieux à partir d’exemples particuliers dans lesquels ils peuvent être engagés. Dans leur approche de l’apprentissage, des sujets qui privilégient l’expérience concrète s’orientent davantage vers leurs pairs que vers les autorités et ils tirent davantage de l’échange et de la discussion avec les sujets qui sont eux aussi à dominante EC."),
    'or' => array("Cela correspond à une approche analytique et conceptuelle de l’apprentissage qui est en rapport avec la pensée logique et l’évaluation rationnelle. Des sujets à score élevé en CA s’intéressent aux objets et aux symboles plus qu’aux personnes. Ils apprennent mieux dans des situations d’apprentissage structurés de manière autoritaire et impersonnelle qui mettent l’accent sur la théorie et l’analyse systématique. Ils sont frustrés par des démarches non structurées d’apprentissage par découverte, comme des exercices et des simulations et ils en tirent peu de bénéfice."),
    'ca' => array("Cela indique une orientation vers un apprentissage par l’action, basé sur l’expérimentation. Des sujets au score élevé en EA apprennent mieux lorsqu’ils peuvents s’engager dans des projets, du travail à la maison ou des discussions en petits groupes. Ils n’aiment pas les situations d’apprentissage passives comme les cours. Ces sujets ont tendance à être extravertis."),
    'ea' => array("Cela indique une approche de l’apprentissage basée sur l’expérimentation, conduite de manière impartiale et réfléchie. Des sujets au score élevé en OR se basent beaucoup sur une observation minutieuse pour formuler un jugement et préfèrent des situations d’apprentissage comme des exposés qui leur permettent d’adopter le rôle d’observateur impartial et objectif. Ces sujets ont tendance à être introvertis.")); 

 if(compareEquality($ec,$oc,$ca,$ea))
 {
    if($ec==$oc and $ec==$ca and $ec==$ea)
    {
         
    }
    else if($ec==$oc and $ec==$ca)
         {
         
         }
         else if($ec==$oc and $ec==$ea)
             {
         
             }
             else if($ec==$ca and $ec==$ea)
                 {
         
                 }
                else if($ec==$oc)
                     {
         
                     }
                     else if($ec==$ca)
                         {
            
                         }
                        else {/*ec == ea*/}
 }
 else 
{
     $sup = compareValues($ec,$oc,$ca,$ea); // recherche de la valeur supérieur
 }
 
 if($sup==$ec)
 {
     $profilStock='ec';
 }
 else if($sup==$oc)
     {
          $profilStock='oc';
     }
     else if($sup==$ca)
         {
              $profilStock='ca';
         }
         else {$profilStock='ea';}
 
 
 $profilDominant = array_shift($profilDescription[$profilStock]); // conversion chaîne en string

/**************************************************************************** 
Affichage dynamique profil d'apprentissage
****************************************************************************/                  
 $profilApprentissage = array(
     'Accomodateur' => array("L'accomodateur a des orientations opposées à celles de l'assimilateur. Il réussit mieux dans les domaines de l'expérience concrète (ec) et l'expérimentation active (ea). Il est surtout capable de réaliser des choses - en mettant en pratique des plans et des expériences - et de s'engager dans de nouvelles expériences. Il a tendance à prendre davantage de risques que les sujets caractéristiques des trois autres catégories. On a retenu le terme accommodateur car un tel sujet réussit particulièrement bien dans des situations ou il s'agit de s'adapter à des circonstances pécifiques. Dans des situations dans lesquelles une théorie ne correspond pas aux faits, cette personne remet le plan ou la théorie en question. Elle a tendance à résoudre les problèmes d'une manière intuitive par essai et erreur, s'appuyant plus sur l'information des autres que sur leur aptitude à l'analyse. Elle est à l'aise avec les autres,mais est souvent perçue comme impatiente et brusque. Sa formation se situe souvent dans le domaine technique ou pratique comme les affaires. On retrouve des personnes ayant ce mode d'apprentissage dans des métiers orientés vers l'action, comme les métiers du commerce."),
    'Divergent' => array("Le divergent a des possibilités d'apprentissage opposées à celles du convergent. Un tel sujet est le plus à l'aise dans une situation d'expérience concrète (ec) et d'observation réfléchie (or). Sa force réside dans l'imagination. Il parvient très bien à percevoir des situations concrètes en adoptant des perspectives variées.  Nous avons appelé ce style divergent car une personne ayant ce mode d'apprentissage réussit  mieux dans des situations qui supposent la création d'idées comme  par exemple des sessions de brainstorming. La recherche montre que les divergents s'intéressent à autrui et font preuve d'imagination et  d'émotion. Ils ont des intérêts culturels étendus et tendent à se spécialiser dans le domaine  artistique. Les conseillers, les spécialistes du développement, les chefs du personnel  sont souvent caractérisés par ce mode d'apprentissage."),
    'Convergent' => array("Les aptitudes d'apprentissage dominantes du convergent sont la conceptualisation abstraite (ca) et l'expérimentation active (ea). La force la plus importante de ce type de sujet réside dans l'application pratique des idées. Une personne ayant ce type semble le mieux réussir dans des situations analogues aux tests d'intelligence, où il n'y a qu'une réponse correcte ou solution à une question ou un problème. La connaissance de cette personne est organisée de telle sorte qu'elle peut se centrer sur des problèmes spécifiques en utilisant une pensée hypothéticodéductive. La recherche concernant ce mode d'apprentissage montre que les convergents sont relativement peu émotifs, préférant s'occuper de choses plutôt que de personnes. Ils ont des intérêts techniques étroits et cherchent à se spécialiser en science physiques. Ce mode d'apprentissage est caractéristique de bon nombres d'ingénieurs."),
    'Assimilateur' => array("L'assimilateur a des aptitudes d'apprentissage dans le domaine de la conceptualisation abstraite (ca) et de l'observation réfléchie (or). Une telle personne a surtout des possibilités dans le domaine de la création des modèles théoriques. Elle réussit particulièrement bien dans le domaine du raisonnement inductif et dans l'organisation d'observations disparates en une explication cohérente. Elle est, comme le convergent, moins intéressée par les autres que par les concepts abstraits ; mais elle se sent moins concernée par l'emploi pratique des théories. Pour un tel sujet, il est plus important que la théorie soit satisfaisante d'un point de vue logique ; dans une situation dans laquelle une théorie ne s'accommoderait pas aux faits, l'assimilateur aurait plutôt tendance à négliger ou à réexaminer les faits. Ce mode d'apprentissage est plutôt caractéristique des sciences de base et des mathématiques que des sciences appliquées. On trouve ce mode d'apprentissage chez les praticiens de la recherche ou de la planification."));

    $profilApprentissage = array_shift($profilApprentissage[$profil]); // stockage description en fonction du profil

/**************************************************************************** 
Insertion de l'utilisateur
****************************************************************************/
$name = $monTabUsers['name'];
$prenom = $monTabUsers['prenom'] ;
$date_naissance = $monTabUsers['date_naissance'];
$formation = $monTabUsers['formation'];

$insert_users = "INSERT INTO users (nom,prenom,date_naissance,formation) VALUES ('".$name."','".$prenom."','".$date_naissance."','".$formation."')";
//echo $insert_users; // debug

$mysqli->query($insert_users); // insertion utilisateur

if($mysqli)
{
//    echo "votre nom d'utilisateur a été enregistré";
}
else {echo "échec de l'insertion dans la base de données";}

/**************************************************************************** 
Insertion résultat
****************************************************************************/

/* idusers en fonction name session et prenom session */
$select_iduser =    "SELECT idusers FROM users 
                            WHERE nom='".$name."' 
                            AND prenom ='".$prenom."'";
//echo $select_iduser;

$result_iduser = $mysqli->query($select_iduser);

while ($sql_iduser = $result_iduser ->fetch_assoc()) // récupération iduser de l'utilisateur
{
    $current_iduser=$sql_iduser['idusers'];
    //testVar($current_iduser); // debug
}

$date=time(); // stockage de la date/heure/minute/seconde de l'insertion dans la base de données
$insert_resultat = "INSERT INTO resultats (oc,ec,ca,ea,profil,date,users_Idusers) VALUES ('".$oc."','".$ec."','".$ca."','".$ea."','".$profil."', '".$date."','".$current_iduser."')";

//testVar2 ($insert_resultat,"test","test"); // debug

$mysqli->query($insert_resultat); // insertion utilisateur

if($mysqli)
{
    //echo "vos résultats d'utilisateur a été enregistré";
}
else {echo "échec d'insertion";}


/**************************************************************************** 
Insertion questions
****************************************************************************/
$insert_questions = "INSERT INTO questions (q1,q2,q3,q4,q5,q6,q7,q8,q9,users_Idusers) VALUES ('".implode("",$_SESSION['questions']['1'])."','".implode("",$_SESSION['questions']['2'])."','".implode("",$_SESSION['questions']['3'])."','".implode("",$_SESSION['questions']['4'])."','".implode("",$_SESSION['questions']['5'])."', '".implode("",$_SESSION['questions']['6'])."','".implode("",$_SESSION['questions']['7'])."','".implode("",$_SESSION['questions']['8'])."','".implode("",$_SESSION['questions']['9'])."','".$current_iduser."')";
//testVar($insert_questions); // debug

$mysqli->query($insert_questions); // insertion des questions -> stocke une suite de caractère ~'1234'
?>

<?php require_once('includes/header.php'); ?>
      
        <div class="row">
            <div class="small-10 small-centered large-uncentered columns">  
                <h2>Votre Profil : <?php echo $profil; ?></h2>
            </div>
            <div class="small-10 small-centered large-uncentered columns">  
               <ul>Vos résultats :
                     <li>Vote score en EC (expérience concrète): <?php echo $ec; ?> </li>
                     <li>Vote score en CA (conceptualisation abstraite): <?php echo $oc; ?> </li>
                     <li>Vote score en EA (expérimentation active): <?php echo $ca; ?> </li>
                     <li>Vote score en OR (observation réfléchie): <?php echo $ea; ?> </li>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="small-12 small-centered large-uncentered columns">  
                <p> Description: <?php echo $profilApprentissage; ?> </p>
            </div>
        </div>
        
        <div class="row"> 
            <div class="small-12 small-centered large-uncentered columns">  
                <p>Description de votre dominante: <?php echo $profilDominant ;?></p>
            </div>
        </div>

        <div class="row"> 
            <div class="small-12 small-centered large-uncentered columns">  
                <canvas id="canvas" width="400" height="400"></canvas>
            </div>
        </div>

                        
<?php

  $test  = 10;
  $test2 = 15;
  $test3 = 100;
  $test4 = 5;
?>
    
    <script>

    var barChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
        {
          fillColor : "rgba(220,220,220,0.5)",
          strokeColor : "rgba(220,220,220,1)",
          data : [<?= $test; ?>,<?= $test4; ?>,<?= $test2; ?>,<?= $test3; ?>,56,55,40]
        },
        {
          fillColor : "rgba(151,187,205,0.5)",
          strokeColor : "rgba(151,187,205,1)",
          data : [<?= $test; ?>,<?= $test4; ?>,<?= $test2; ?>,<?= $test3; ?>,96,27,100]
        }
      ]
      
    }

  var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(barChartData);
  
  </script>
<?php require_once('includes/footer.php'); ?>