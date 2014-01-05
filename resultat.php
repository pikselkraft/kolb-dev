<?php
session_start();
require_once('includes/function.php');
require_once('includes/connexion.php');
/**************************
Index.php
resultat du questionnaire Kolb --> affichage du résultat du questionnaire

20/12/13
*************************/


/**************************************************************************** 
****************************************************************************

A faire ->  insertion question
            
            travail perso

****************************************************************************
****************************************************************************/

$monTabQuestion = $_SESSION['questions'];
$monTabUsers = $_SESSION['user'];


$ec= $_SESSION['questions']['2']['0'] + $_SESSION['questions']['3']['0'] + $_SESSION['questions']['4']['0'] + $_SESSION['questions']['5']['0'] + $_SESSION['questions']['6']['0'] + $_SESSION['questions']['7']['0'];

$oc= $_SESSION['questions']['1']['1'] + $_SESSION['questions']['3']['1'] + $_SESSION['questions']['6']['1'] + $_SESSION['questions']['7']['1'] + $_SESSION['questions']['8']['1'] + $_SESSION['questions']['9']['1'];

$ca= $_SESSION['questions']['2']['2'] + $_SESSION['questions']['3']['2'] + $_SESSION['questions']['4']['2'] + $_SESSION['questions']['5']['2'] + $_SESSION['questions']['8']['2'] + $_SESSION['questions']['9']['2'];

$ea= $_SESSION['questions']['1']['3'] + $_SESSION['questions']['3']['3'] + $_SESSION['questions']['6']['3'] + $_SESSION['questions']['7']['3'] + $_SESSION['questions']['8']['3'] + $_SESSION['questions']['9']['3'];

echo "<br /> EC :". $ec;
echo "<br /> OR :". $oc;
echo "<br /> CA :". $ca;
echo "<br /> EA :". $ea;

$y = $ca - $ec; 
$x = $ea - $oc; 

echo "<br /> ca_ec y : " . $y;
echo "<br /> ea_or x : " . $x;

echo "<br />"; 
if($x >= 3 && $x <= 17 && $y <= 2 && $y >= -12)
{
    echo "Accomodateur";
}
else if($x <= 2 && $x >= -15 && $y <= 2 && $y >= -12)
{
    echo "Divergent";
    
} else if($x >= 3 && $x <= 17 && $y >= 3 && $y <= 18)
{
    echo "Convergent";
}
else if($x <= 2 && $x >= -15 && $y >= 3 && $y <= 18)
{
    echo "Assimilateur";
}
else {echo"vous êtes bizarre";}

/**************************************************************************** 
Insertion de l'utilisateur
****************************************************************************/
$name = $monTabUsers['name'];
$prenom = $monTabUsers['prenom'] ;
$date_naissance = $monTabUsers['date_naissance'];
$formation = $monTabUsers['formation'];

$insert_users = "INSERT INTO users (nom,prenom,date_naissance,formation) VALUES ('".$name."','".$prenom."','".$date_naissance."','".$formation."')";
echo $insert_users;


$mysqli->query($insert_users); // INSERTION utilisateur

if($mysqli)
{
    echo "votre nom d'utilisateur a été enregistré";
}
else {echo "échec d'insertion";}

/**************************************************************************** 
Insertion résultat
****************************************************************************/

// idusers en fonction name session et date
testVar($date_naissance);

$select_iduser =    "SELECT idusers FROM users 
                    WHERE nom='".$name."' 
                    AND prenom ='".$prenom."'";
echo $select_iduser;

$result_iduser = $mysqli->query($select_iduser);

while ($sql_iduser = $result_iduser ->fetch_assoc()) // récupération iduser de l'utilisateur
{
    $current_iduser=$sql_iduser['idusers'];
    testVar($current_iduser);
}
$profil="convergent";
$date=time();
$insert_resultat = "INSERT INTO resultats (oc,ec,ca,ea,profil,date,users_Idusers) VALUES ('".$oc."','".$ec."','".$ca."','".$ea."','".$profil."', '".$date."','".$current_iduser."')";

testVar2 ($insert_resultat,"test","test");

$mysqli->query($insert_resultat); // INSERTION utilisateur

if($mysqli)
{
    echo "votre nom d'utilisateur a été enregistré";
}
else {echo "échec d'insertion";}


/**************************************************************************** 
Insertion questions
****************************************************************************/


?>

<?php require_once('includes/header.php'); ?>
    
<?php require_once('includes/footer.php'); ?>