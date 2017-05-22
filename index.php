<?php
/**
 * homepage of the application
 */

include "views/header.php";

require_once "classCat.php";

$tater = new Cat("Tater B. Arfoluem");

$rex = new Cat("Rex Daniels");
$rex->setGender("Male");
$rex->setWeight(4343343);
$rex->setColoring("red");
echo 'The weight of '. $rex->getName() . ' is ' . $rex->getWeight() . ' and the Gender is ' . $rex->getGender() . ' and ' . $rex->getName() . '\'s weight is ' . $rex->getWeight() . '. Pretty cool.';

include "views/footer.php";