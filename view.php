<?php
/**
 * view template
 */

include "views/header.php";
require_once 'classCat.php';
require_once 'classUtility.php';


$newCat_class = new \Cat\Cat();
$approvedGenders = $newCat_class->setAllowedGenders();
$approvedColors = $newCat_class->setAllowedColorings();
$approvedMoods = $newCat_class->setApprovedMood();
$approvedHairLength = $newCat_class->checkIsHairLengthApproved();

$time = \Cat\Utility::getDateTime();

//get id of record from url
$catId = $_GET['id'];

$currentCatData = $newCat_class->getSingleCatByID($catId);

$ourCat = \Cat\Cat::fromID($catId);

if (!empty($error_message)) : ?>
    <div id="error"><p>Error: <?=$error_message?></p></div>
<?php endif; ?>
    <h2 class="page_heading">View <?=$ourCat->catName?> Cat</h2>
    <form>
        <div class="entry">
            <label>Cat Name</label>
            <?=$ourCat->catName?>
        </div>
        <div class="entry">
            <label>Age</label>
            <?=$ourCat->age?>
        </div>
        <div class="entry">
            <label>Weight</label>
            <?=$ourCat->weight?>
        </div>
        <div class="entry">
            <label>Gender</label>
            <?=$ourCat->gender?>
        </div>
        <div class="entry">
            <label>Color</label>
            <?=$ourCat->coloring?>
        </div>
        <div class="entry">
            <label>Current Mood</label>
            <?=$ourCat->currentMood?>
        </div>
        <div class="entry">
            <label>Hair Length</label>
            <?=$ourCat->hairLength?>
        </div>
    </form>


<?php include "views/footer.php";?>