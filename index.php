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

include "views/footer.php";