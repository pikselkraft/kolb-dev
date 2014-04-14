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
$monTabUsers    = $_SESSION['user'];


$ec = $_SESSION['questions']['2']['0'] + $_SESSION['questions']['3']['0'] + $_SESSION['questions']['4']['0'] + $_SESSION['questions']['5']['0'] + $_SESSION['questions']['6']['0'] + $_SESSION['questions']['7']['0'];

$oc = $_SESSION['questions']['1']['1'] + $_SESSION['questions']['3']['1'] + $_SESSION['questions']['6']['1'] + $_SESSION['questions']['7']['1'] + $_SESSION['questions']['8']['1'] + $_SESSION['questions']['9']['1'];

$ca = $_SESSION['questions']['2']['2'] + $_SESSION['questions']['3']['2'] + $_SESSION['questions']['4']['2'] + $_SESSION['questions']['5']['2'] + $_SESSION['questions']['8']['2'] + $_SESSION['questions']['9']['2'];

$ea = $_SESSION['questions']['1']['3'] + $_SESSION['questions']['3']['3'] + $_SESSION['questions']['6']['3'] + $_SESSION['questions']['7']['3'] + $_SESSION['questions']['8']['3'] + $_SESSION['questions']['9']['3'];

$y  = $ca - $ec; 
$x  = $ea - $oc; 

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
    'ec' => array("Cela correspond &agrave; une approche de l’apprentissage bas&eacute;e sur la r&eacute;ceptivit&eacute; et l’exp&eacute;rience, ce qui d&eacute;pend essentiellement de jugements inspir&eacute;s par le sentiment. Des sujets &agrave; score &eacute;lev&eacute; en EC ont tendance &agrave; &ecirc;tre empathiques et orientés vers les autres. Ils trouvent en général que les apports théoriques sont sans utilit&eacute; et pr&eacute;f&egrave;rent traiter chaque situation comme un cas unique. Ils apprennent mieux &agrave; partir d’exemples particuliers dans lesquels ils peuvent &ecirc;tre engag&eacute;s. Dans leur approche de l’apprentissage, des sujets qui privil&eacute;gient l’exp&eacute;rience concr&egrave;te s’orientent davantage vers leurs pairs que vers les autorit&eacute;s et ils tirent davantage de l’&eacute;change et de la discussion avec les sujets qui sont eux aussi &agrave; dominante EC."),
    'or' => array("Cela correspond &agrave; une approche analytique et conceptuelle de l’apprentissage qui est en rapport avec la pens&eacute;e logique et l’&eacute;valuation rationnelle. Des sujets à score élevé en CA s’int&eacute;ressent aux objets et aux symboles plus qu’aux personnes. Ils apprennent mieux dans des situations d’apprentissage structur&eacute;s de manière autoritaire et impersonnelle qui mettent l’accent sur la th&eacute;orie et l’analyse syst&eacute;matique. Ils sont frustr&eacute;s par des d&eacute;marches non structurées d’apprentissage par d&eacute;couverte, comme des exercices et des simulations et ils en tirent peu de b&eacute;n&eacute;fice."),
    'ca' => array("Cela indique une orientation vers un apprentissage par l’action, bas&eacute; sur l’exp&eacute;rimentation. Des sujets au score élevé en EA apprennent mieux lorsqu’ils peuvents s’engager dans des projets, du travail &agrave; la maison ou des discussions en petits groupes. Ils n’aiment pas les situations d’apprentissage passives comme les cours. Ces sujets ont tendance à être extravertis."),
    'ea' => array("Cela indique une approche de l’apprentissage basée sur l’exp&eacute;rimentation, conduite de mani&egrave;re impartiale et r&eacute;fl&eacute;chie. Des sujets au score &eacute;lev&eacute; en OR se basent beaucoup sur une observation minutieuse pour formuler un jugement et préfèrent des situations d’apprentissage comme des expos&eacute;s qui leur permettent d’adopter le r&ocirc;le d’observateur impartial et objectif. Ces sujets ont tendance &agrave; &ecirc;tre introvertis.")); 

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
     'Accomodateur' => array("L'accomodateur a des orientations oppos&eacute;es &agrave; celles de l'assimilateur. Il r&eacute;ussit mieux dans les domaines de l'exp&eacute;rience concr&egrave;te (ec) et l'exp&eacute;rimentation active (ea). Il est surtout capable de r&eacute;aliser des choses - en mettant en pratique des plans et des exp&eacute;riences - et de s'engager dans de nouvelles exp&eacute;riences. Il a tendance &agrave; prendre davantage de risques que les sujets caract&eacute;ristiques des trois autres cat&eacute;gories. On a retenu le terme accommodateur car un tel sujet r&eacute;ussit particuli&egrave;rement bien dans des situations ou il s'agit de s'adapter &agrave; des circonstances p&eacute;cifiques. Dans des situations dans lesquelles une th&eacute;orie ne correspond pas aux faits, cette personne remet le plan ou la th&eacute;orie en question. Elle a tendance &agrave; r&eacute;soudre les probl&egrave;mes d'une mani&egrave;re intuitive par essai et erreur, s'appuyant plus sur l'information des autres que sur leur aptitude &agrave; l'analyse. Elle est &agrave; l'aise avec les autres,mais est souvent per&ccedil;ue comme impatiente et brusque. Sa formation se situe souvent dans le domaine technique ou pratique comme les affaires. On retrouve des personnes ayant ce mode d'apprentissage dans des m&eacute;tiers orient&eacute;s vers l'action, comme les m&eacute;tiers du commerce."),
     'Divergent'    => array("Le divergent a des possibilit&eacute;s d'apprentissage oppos&eacute;es &agrave; celles du convergent. Un tel sujet est le plus &agrave; l'aise dans une situation d'exp&eacute;rience concr&egrave;te (ec) et d'observation r&eacute;fl&eacute;chie (or). Sa force r&eacute;side dans l'imagination. Il parvient tr&egrave;s bien &agrave; percevoir des situations concr&egrave;tes en adoptant des perspectives vari&eacute;es.  Nous avons appel&eacute; ce style divergent car une personne ayant ce mode d'apprentissage r&eacute;ussit  mieux dans des situations qui supposent la cr&eacute;ation d'id&eacute;es comme  par exemple des sessions de brainstorming. La recherche montre que les divergents s'int&eacute;ressent &agrave; autrui et font preuve d'imagination et  d'&eacute;motion. Ils ont des int&eacute;r&ecirc;ts culturels &eacute;tendus et tendent &agrave; se sp&eacute;cialiser dans le domaine  artistique. Les conseillers, les sp&eacute;cialistes du d&eacute;veloppement, les chefs du personnel  sont souvent caract&eacute;ris&eacute;s par ce mode d'apprentissage."),
     'Convergent'   => array("Les aptitudes d'apprentissage dominantes du convergent sont la conceptualisation abstraite (ca) et l'exp&eacute;rimentation active (ea). La force la plus importante de ce type de sujet r&eacute;side dans l'application pratique des id&eacute;es. Une personne ayant ce type semble le mieux r&eacute;ussir dans des situations analogues aux tests d'intelligence, o&ugrave; il n'y a qu'une r&eacute;ponse correcte ou solution &agrave; une question ou un probl&egrave;me. La connaissance de cette personne est organis&eacute;e de telle sorte qu'elle peut se centrer sur des probl&egrave;mes sp&eacute;cifiques en utilisant une pens&eacute;e hypoth&eacute;ticod&eacute;ductive. La recherche concernant ce mode d'apprentissage montre que les convergents sont relativement peu &eacute;motifs, pr&eacute;f&eacute;rant s'occuper de choses plut&ocirc;t que de personnes. Ils ont des int&eacute;r&ecirc;ts techniques &eacute;troits et cherchent &agrave; se sp&eacute;cialiser en science physiques. Ce mode d'apprentissage est caract&eacute;ristique de bon nombres d'ing&eacute;nieurs."),
     'Assimilateur' => array("L'assimilateur a des aptitudes d'apprentissage dans le domaine de la conceptualisation abstraite (ca) et de l'observation r&eacute;fl&eacute;chie (or). Une telle personne a surtout des possibilit&eacute;s dans le domaine de la cr&eacute;ation des mod&egrave;les th&eacute;oriques. Elle r&eacute;ussit particuli&egrave;rement bien dans le domaine du raisonnement inductif et dans l'organisation d'observations disparates en une explication coh&eacute;rente. Elle est, comme le convergent, moins int&eacute;ress&eacute;e par les autres que par les concepts abstraits ; mais elle se sent moins concern&eacute;e par l'emploi pratique des th&eacute;ories. Pour un tel sujet, il est plus important que la th&eacute;orie soit satisfaisante d'un point de vue logique ; dans une situation dans laquelle une th&eacute;orie ne s'accommoderait pas aux faits, l'assimilateur aurait plut&ocirc;t tendance &agrave; n&eacute;gliger ou &agrave; r&eacute;examiner les faits. Ce mode d'apprentissage est plut&ocirc;t caract&eacute;ristique des sciences de base et des math&eacute;matiques que des sciences appliqu&eacute;es. On trouve ce mode d'apprentissage chez les praticiens de la recherche ou de la planification."));

    $profilApprentissage = array_shift($profilApprentissage[$profil]); // stockage description en fonction du profil

/**************************************************************************** 
Insertion de l'utilisateur
****************************************************************************/
$name           = $monTabUsers['name'];
$prenom         = $monTabUsers['prenom'] ;
$date_naissance = $monTabUsers['date_naissance'];
$formation      = $monTabUsers['formation'];

$insert_users = "INSERT INTO users (nom,prenom,date_naissance,formation) VALUES ('".$name."','".$prenom."','".$date_naissance."','".$formation."')";

$mysqli->query($insert_users); // insertion utilisateur

if($mysqli)
{
    $messageAlert = "";
}
else {echo "&eacute;chec de l'insertion dans la base de donn&eacute;es";}

/**************************************************************************** 
Insertion résultat
****************************************************************************/

/* idusers en fonction name session et prenom session */
$select_iduser =    "SELECT idusers FROM users 
                            WHERE nom='".$name."' 
                            AND prenom ='".$prenom."'";

$result_iduser = $mysqli->query($select_iduser);

while ($sql_iduser = $result_iduser ->fetch_assoc()) // récupération iduser de l'utilisateur
{
    $current_iduser=$sql_iduser['idusers'];
}

$date=time(); // stockage de la date/heure/minute/seconde de l'insertion dans la base de données
$insert_resultat = "INSERT INTO resultats (oc,ec,ca,ea,profil,date,users_Idusers) VALUES ('".$oc."','".$ec."','".$ca."','".$ea."','".$profil."', '".$date."','".$current_iduser."')";

$mysqli->query($insert_resultat); // insertion utilisateur

if($mysqli)
{
    $messageAlert = "";
}
else {$messageAlert = "&eacute;chec d'insertion";}


/**************************************************************************** 
Insertion questions
****************************************************************************/
$insert_questions = "INSERT INTO questions (q1,q2,q3,q4,q5,q6,q7,q8,q9,users_Idusers) VALUES ('".implode("",$_SESSION['questions']['1'])."','".implode("",$_SESSION['questions']['2'])."','".implode("",$_SESSION['questions']['3'])."','".implode("",$_SESSION['questions']['4'])."','".implode("",$_SESSION['questions']['5'])."', '".implode("",$_SESSION['questions']['6'])."','".implode("",$_SESSION['questions']['7'])."','".implode("",$_SESSION['questions']['8'])."','".implode("",$_SESSION['questions']['9'])."','".$current_iduser."')";

$mysqli->query($insert_questions); // insertion des questions -> stocke une suite de caractère ~'1234'
?>

<?php require_once('includes/header.php'); ?>
      
        <div class="row panel">
            <div class="small-3 columns">
                <h2>Votre Profil : </h2>
                <br>
                <h3 class="button large" id="custom-h3"><?= $profil; ?></h3>
                <br><br>
                <h4>Votre Dominante : </h4>
                <br>
                <h6 class="button" id="custom-h3"><?= strtoupper($profilStock); ?></h6>
            </div>
            <div class="small-9 columns">
                <canvas id="canvas" width="600" height="300"></canvas>
            </div>
        </div>
        
        <div class="row panel">
            <div class="small-12 small-centered large-uncentered columns">  
                <p> Description: <?= $profilApprentissage; ?> </p>
            </div>
        </div>
        
        <div class="row panel"> 
            <div class="small-12 small-centered large-uncentered columns">  
                <p>Description de votre dominante: <?= $profilDominant ;?></p>
            </div>
        </div>
                        
  <!-- <div class="small-10 small-centered large-uncentered columns">  
               <ul>Vos résultats :
                     <li>Vote score en EC (exp&eacute;rience concr&egrave;te): <?= $ec; ?> </li>
                     <li>Vote score en CA (conceptualisation abstraite): <?= $oc; ?> </li>
                     <li>Vote score en EA (exp&eacute;rimentation active): <?= $ca; ?> </li>
                     <li>Vote score en OR (observation r&eacute;fl&eacute;chie): <?= $ea; ?> </li>
                </ul>
        </div> -->
        
    
    <script type="text/javascript">

      var data = {
        labels : ["EC : <?= $ec; ?>","CA : <?= $oc; ?>","EA : <?= $ca; ?>","OR : <?= $ea; ?>"],
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : [<?= $ec; ?>,<?= $oc; ?>,<?= $ca; ?>,<?= $ea; ?>]
            }
        ]
    }

      var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Radar(data);
      
    </script>
<?php require_once('includes/footer.php'); ?>