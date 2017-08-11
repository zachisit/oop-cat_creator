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

<?php
//delete a record
//$delete_a_cat = $db->deleteRow('7');

//create new cat and push to database

$today_time = date('Y-m-d h:i:sa');

$new_cat = [
    'catName' => 'john boy',
    'age' => '12',
    'gender' => 'female',
    'createTime' => $today_time,
    'coloring' => 'brown',
    'hairLength' => 'medium',
    'currentMood' => 'sleepy',
    'weight' => '464',
    'hasCatittude' => 0,
    'id' => '11'
];

//$addNewCat = $db->insertRow($new_cat);
?>





<br /><br />
<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Cat Name</td>
        <td>Age</td>
        <td>Gender</td>
        <td>Date Created</td>
        <td>Coloring</td>
        <td>Hair Length</td>
        <td>Current Mood</td>
        <td>Weight</td>
        <td>Have Catittude?</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        $yes = '1';

        foreach( $fetch_all_cats as $record)
        {
            echo '<tr>';
            echo '<td>' . $record['id'] . '</td>';
            echo '<td>' . $record['catName'] . '</td>';
            echo '<td>' . $record['age'] . '</td>';
            echo '<td>' . $record['gender'] . '</td>';
            echo '<td>' . $record['createTime'] . '</td>';
            echo '<td>' . $record['coloring'] . '</td>';
            echo '<td>' . $record['hairLength'] . '</td>';
            echo '<td>' . $record['currentMood'] . '</td>';
            echo '<td>' . $record['weight'] . '</td>';
            if ($record['hasCatittude'] === $yes) {
                echo '<td>Yes</td>';
            } else {
                echo '<td>Nope</td>';
            }
            //echo '<td>' . $record['hasCatittude'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tr>
    </tbody>

</table>


<?php
/*
 * hide all below
$tater->setGender("gender fluid");
$tater->setWeight(23223);
$tater->setColoring("calico");
echo 'The weight of '. $tater->getName() . ' is ' . $tater->getWeight() . ' and the Gender is ' . $tater->getGender() . ' and ' . $tater->getName() . '\'s color is ' . $tater->getColoring() . '. Pretty groovy.<br /><br />';
//echo $tater->checkIsGenderApproved() ? 1 : 0;

/* create new cat called Rex */
/*
 * hide all below
$rex = new Cat("Rex Daniels");
$rex->setGender("male");
$rex->setWeight(4343343);
$rex->setColoring("red");
echo 'The weight of '. $rex->getName() . ' is ' . $rex->getWeight() . ' and the Gender is ' . $rex->getGender() . ' and ' . $rex->getName() . '\'s color is ' . $rex->getColoring() . '. Pretty cool.<br /><br />';

/* create new cat called Bobcat */
/*
 * hide all below
$bobcat = new Cat("Bobcat");
$bobcat->setWeight("rar");
echo $bobcat->getWeight();
echo "<br />";
echo "<br />";

/* set and return color */
/*
 * hide all below
$rex->setColoring("brown");
echo $rex->getColoring();
echo "<br />";
echo "<br />";
//echo $rex->checkIsColorApproved() ? 1 : 0;

/* set and return mood with feedback response based on data */
/*
 * hide all below
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
/*
 * hide all below
$rex->setHairLength('long');
echo $rex->getName() . '\'s length of hair is '. $rex->getHairLength();
echo "<br />";
echo "<br />";

/* set and determind if cat has catitude */
//echo $rex->getCatitudeStatus();
/*
 * hide all below
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



*///used from the hide all data block
include "views/footer.php";