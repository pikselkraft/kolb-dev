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
    $testEquality = ($val1===$val2 or $val1===$val3 or $val1===$val4 or $val2===$val3 or $val2===$val4 or $val3===$val4) ? true : false;
    return $testEquality;   
}

function compareValues($val1,$val2,$val3,$val4)
{
    $test1 = max($val1,$val2);
    $test2 = max($test1,$val3); 
    $testMax = max($test2,$val3);
    return $testMax;
}

function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

?>