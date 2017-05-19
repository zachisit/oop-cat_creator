<?php
/**
 * homepage of the application
 */

include "views/header.php";

require_once "classCat.php";

$tater = new Cat("Tater B. Arfoluem");

$rex = new Cat();

$tater->getName();
$rex->getName();

$tater->setWeight(1232);
$tater->getWeight();

$rex->setWeight(7065815504);
$rex->getWeight();

$rex->setGender("male");
$rex->getGender();

$tater->getGender();


$tater->setColoring("purple");
$tater->getColoring();

include "views/footer.php";