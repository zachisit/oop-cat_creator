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

$rex->setWeight(70658155033);
$rex->getWeight();



include "views/footer.php";