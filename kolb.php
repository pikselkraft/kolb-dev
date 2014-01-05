

<?php
$questions = array(
	1 => array("différencier", "essayer", "s'impliquer", "être pratique"),
	2 => array("réceptif", "logique", "méthodique", "impartial"),
	3 => array("ressentir", "faire attention", "réfléchir", "faire"),
	4 => array("accepter", "prendre des risques", "évaluer", "prendre conscience"),
	5 => array("intuitif", "productif", "logique", "interrogateur"),
	6 => array("abstrait", "observateur", "concret", "actif"),
	7 => array("orienté vers le présent", "réflichissant", "orienté vers le futur", "pragmatique"),
	8 => array("partir de son expérience", "observer", "penser", "expérimenter"),
	9 => array("intense", "réservé", "rationel", "responsable")
); 
//print_r($questions);


echo $questions[1][3];
echo "------------";

foreach($questions[1] as $element)
{
    echo $element;
    echo " ";
}
?>