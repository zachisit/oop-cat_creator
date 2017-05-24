<?php
/**
 * homepage of the application
 */
namespace Cat;

include "views/header.php";

require_once "classCat.php";

/* create new cat called Tater */
$tater = new Cat("Tater B. Arfoluem");
$tater->setGender("female");
$tater->setWeight(23223);
$tater->setColoring("calico");
echo 'The weight of '. $tater->getName() . ' is ' . $tater->getWeight() . ' and the Gender is ' . $tater->getGender() . ' and ' . $tater->getName() . '\'s color is ' . $tater->getColoring() . '. Pretty groovy.<br /><br />';

/* create new cat called Rex */
$rex = new Cat("Rex Daniels");
$rex->setGender("Male");
$rex->setWeight(4343343);
$rex->setColoring("red");
echo 'The weight of '. $rex->getName() . ' is ' . $rex->getWeight() . ' and the Gender is ' . $rex->getGender() . ' and ' . $rex->getName() . '\'s color is ' . $rex->getColoring() . '. Pretty cool.<br /><br />';

/* create new cat called Bobcat */
$bobcat = new Cat("Bobcat");
$bobcat->setWeight("rar");
echo $bobcat->getWeight();
echo "<br />";
echo "<br />";

/* set and return color */
$rex->setColoring("brown");
echo $rex->getColoring();
echo "<br />";
echo "<br />";
//echo $rex->checkIsColorApproved() ? 1 : 0;

/*set and return mood with feedback response based on data */
$rex->setMood("rowdy");
echo $rex->getName(). 'is currently ' . $rex->getMood() . '!';
echo "<br />";
echo "<br />";
switch($rex->getMood()) {
    case 'grumpy':
        echo 'uh oh, watch out - '. $rex->getName() .' is grumpy!';
        break;
    case 'sleepy':
        echo 'oh no, ' . $rex->getName() . ' is super sleepy. put this pug to bed!';
        break;
    case 'rowdy':
        echo 'be careful, '. $rex->getName() . 'just tore up the living room. this pug is rowdy! let him outside';
        //@TODO: change 'him' to be dynamic based on gender check
        break;
    case 'hungry':
        echo 'poor thing needs his food! give '. $rex->getName() . ' some food!';
        //@TODO: change 'him' to be dynamic based on gender check
        break;
    case 'thirsty':
        echo 'your pug is thirsty! give '. $rex->getName() . ' some water!';
        break;
}

echo "<br />";
echo "<br />";
//echo $rex->checkIsMoodApproved() ? 1 : 0;


include "views/footer.php";