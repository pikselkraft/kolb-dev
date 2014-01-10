<?php

function testVar ($var) // fonction de debug simple
{
	echo "<div id=\"test\" style=\"border:3px solid red;width:50%;\">";
	echo "<h6 style=\"color:blue;\"> DEBUT TEST </h6>";
	echo "<br /> Test de la variable en cours : " . $var . "<br />";
	echo "<br />";	
	var_dump($var);
	echo "<br />";echo "<br />";
	print_r($var);
	echo "<h6 style=\"color:blue;\"> FIN TEST </h6>";
	echo "</div>";
	
}

function menu() 
{
    echo "<nav>";
    echo '<li><a href="index.php">index</a></li>';
    echo '<li><a href="inscription.php">inscription</a></li>';
    echo '<li><a href="questionaire.php">questionaire</a></li>';
    echo '<li><a href="resultat.php">resultat</a></li>';
    echo "</nav>";
}
function testVar2 ($var,$text,$titre) // fonction de debug 
{
	echo "<div id=\"test\" style=\"border:3px solid red;width:50%;\">";
	echo "<h6 style=\"color:blue;\"> DEBUT TEST " . $titre . " </h6>";
	echo "<br />" . $text . " : " . $var . "<br />";
	echo "<br />";
	var_dump($var);
	echo "<br />";echo "<br />";
	print_r($var);
	echo "<h6 style=\"color:blue;\"> FIN TEST " . $titre . " </h6>";
	echo "</div>";
}

function secInput($data) // SÉCURISATION DES INPUT
{
            $data = stripslashes($data); 
			// Supprime les antislashs d'une chaîne
            $data = strip_tags($data); 
			//strip_tags() tente de retourner la chaîne str après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. Elle génère des alertes si les balises sont incomplètes ou erronées.
          
            $data = trim($data); 
			// trim() retourne la chaîne str, après avoir supprimé les caractères invisibles en début et fin de chaîne. Si le second paramètre charlist est omis, trim() supprimera les caractères suivants.
            $data = htmlentities($data); 
			// empêche les caractères html > htmlentities.
          
          return $data;
}

function calcul($nb1,$nb2)
{
    $nb3 = $nb1+$nb2;
    return $nb3;
}

function compareEquality($val1,$val2,$val3,$val4)
{
    if ($val1===$val2 or $val1===$val3 or $val1===$val4 or $val2===$val3 or $val2===$val4 or $val3===$val4)
    {
        return true;
    }
    else {return false;}    
}

function compareValues($val1,$val2,$val3,$val4)
{
    $test1 = max($val1,$val2);
    $test2 = max($test1,$val3); 
    $testMax = max($test2,$val3);
    return $testMax;
}

?>