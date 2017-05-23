<?php
/**
 * homepage of the application
 */

include "views/header.php";

require_once "classCat.php";

$tater = new Cat("Tater B. Arfoluem");
$tater->setGender("female");
$tater->setWeight(23223);
$tater->setColoring("calico");
echo 'The weight of '. $tater->getName() . ' is ' . $tater->getWeight() . ' and the Gender is ' . $tater->getGender() . ' and ' . $tater->getName() . '\'s color is ' . $tater->getColoring() . '. Pretty groovy.<br /><br />';

$rex = new Cat("Rex Daniels");
$rex->setGender("Male");
$rex->setWeight(4343343);
$rex->setColoring("red");
echo 'The weight of '. $rex->getName() . ' is ' . $rex->getWeight() . ' and the Gender is ' . $rex->getGender() . ' and ' . $rex->getName() . '\'s color is ' . $rex->getColoring() . '. Pretty cool.<br /><br />';


$bobcat = new Cat("Bobcat");
$bobcat->setWeight("rar");
echo $bobcat->getWeight();

echo "<p></p>";
echo "<p></p>";
$rex->setColoring("barf");
echo $rex->getColoring();
echo "<br />";

echo $rex->checkIsColorApproved() ? 1 : 0;
//echo $rex->checkIsColorApproved();

include "views/footer.php";