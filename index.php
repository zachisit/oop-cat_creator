<?php
/**
 * homepage of the application
 */
namespace Cat;

include "views/header.php";

require_once "classCat.php";
require_once "classDatabase.php";

//database connection stuff
$db = new database();//connect to db


$fetch_all_cats = $db->getRows("SELECT * FROM users");
//save into array
//print_r($fetch_all_cats);
?>
    <!--
    this below works, i am just hiding to test delete method
<table>
    <thead>
    <tr>
        <td>Cat Name</td>
        <td>Age</td>
        <td>Gender</td>
        <td>Coloring</td>
        <td>Current Mood</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        foreach( $fetch_all_cats as $record)
        {
            echo '<tr>';
            echo '<td>' . $record['catName'] . '</td>';
            echo '<td>' . $record['age'] . '</td>';
            echo '<td>' . $record['gender'] . '</td>';
            echo '<td>' . $record['coloring'] . '</td>';
            echo '<td>' . $record['currentMood'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tr>
    </tbody>

</table>
-->

<?php
//delete a record
$delete_a_cat = $db->deleteRow("DELETE FROM users WHERE id = 5");




//echo '<pre>';
//pint_r($getRow);
//echo '</pre>';

$t = new \DateTime();

$data = [
    'catname' => 'bobcat',
    'age' => '23',
    'gender' => 'male',
    'createTime' => $t->format('Y-m-d H:i:s'),
    'coloring' => 'calico',
    'hairLength' => 'medium',
    'currentMood' => 'sleepy',
    'weight' => '8',
    'hasCatitude' => '1'
];

/* create new cat called Tater */
$tater = new Cat("Tater B. Arfoluem");
$tater->setGender("gender fluid");
$tater->setWeight(23223);
$tater->setColoring("calico");
echo 'The weight of '. $tater->getName() . ' is ' . $tater->getWeight() . ' and the Gender is ' . $tater->getGender() . ' and ' . $tater->getName() . '\'s color is ' . $tater->getColoring() . '. Pretty groovy.<br /><br />';
//echo $tater->checkIsGenderApproved() ? 1 : 0;

/* create new cat called Rex */
$rex = new Cat("Rex Daniels");
$rex->setGender("male");
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

/* set and return mood with feedback response based on data */
$rex->setMood("rowdy");
echo $rex->getName(). 'is currently ' . $rex->getMood() . '!';
echo "<br />";
echo "<br />";

//@TODO: i am torn if i should move this to a class method, or if i should leave in this page. i guess it will depend on how this app evolves when we start creating the user input phase
switch( $rex->getMood() ) {
    case 'grumpy':
        echo 'Uh oh, watch out - '. $rex->getName() .' is grumpy!';
        break;
    case 'sleepy':
        echo 'Oh no, ' . $rex->getName() . ' is super sleepy. Put '. $rex->returnGenderPronounUsage() . ' pug to bed!';
        break;
    case 'rowdy':
        echo 'Be careful, '. $rex->getName() . ' just tore up the living room. This pug is rowdy! Let '. $rex->returnGenderPronounUsage() . ' outside!!';
        break;
    case 'hungry':
        echo 'Poor thing needs his food! Give '. $rex->getName() . ' some food!';
        break;
    case 'thirsty':
        echo 'Your pug is thirsty! Give '. $rex->getName() . ' some water!';
        break;
}
echo "<br />";
echo "<br />";
//echo $rex->checkIsMoodApproved() ? 1 : 0;
echo "<br />";
echo "<br />";

/* set and return hair length */
$rex->setHairLength('long');
echo $rex->getName() . '\'s length of hair is '. $rex->getHairLength();
echo "<br />";
echo "<br />";

/* set and determind if cat has catitude */
//echo $rex->getCatitudeStatus();
//@TODO: i am torn if i should move this to a class method, or if i should leave in this page. i guess it will depend on how this app evolves when we start creating the user input phase
switch($rex->getCatitudeStatus()) {
    case 0:
        echo 'currently '. $rex->getName() . ' does not have catitude. what a bummer.<br />';
        break;
    case 1:
        echo 'currently '. $rex->getName() . ' does have catitude. nice!<br />';
        break;
}

echo "<br />";
$tater->setHasCatitude(1);
//@TODO: i am torn if i should move this to a class method, or if i should leave in this page. i guess it will depend on how this app evolves when we start creating the user input phase
switch($tater->getCatitudeStatus()) {
    case 0:
        echo 'currently '. $tater->getName() . ' does not have catitude. what a bummer.<br />';
        break;
    case 1:
        echo 'currently '. $tater->getName() . ' does have catitude. nice!<br />';
        break;
}




include "views/footer.php";