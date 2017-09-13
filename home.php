<?php
/**
 * home template
 */

include "views/header.php";?>
<?php

$newCatData = [];

if (isset($_POST['create_cat'])) {
    $newCatData[1] = $_POST['cat_name'];
    $newCatData[2] = $_POST['cat_weight'];
    $newCatData[3] = $_POST['cat_gender'];
    $newCatData[4] = $_POST['cat_color'];
    $newCatData[5] = $_POST['cat_mood'];
    $newCatData[6] = $_POST['cat_hair_length'];
}

var_dump($newCatData);

//$cat = new \Cat\Cat('');
?>
<div id="error"><?php //error messages here ?></div>
<form name="cat_creation" method="post">
    <div class="entry">
        <label>Cat Name</label>
        <input type="text" name="cat_name" value="<?=$newCatName?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Weight</label>
        <input type="text" name="cat_weight" value="<?=$newCatWeight?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Gender</label>
        <input type="text" name="cat_gender" value="<?=$newCatGender?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Color</label>
        <input type="text" name="cat_color" value="<?=$newCatColor?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Current Mood</label>
        <input type="text" name="cat_mood" value="<?=$newCatMood?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Hair Length</label>
        <input type="text" name="cat_hair_length" value="<?=$newCatHairLength?>" maxlength="30" size="8" />
    </div>
    </div>

    <div class="entry">
        <input type="submit" value="Create Cat Now" id="submit" name="create_cat" />
    </div>
    <input type="hidden" name="hid-submit" value="1" />
</form>
<?php include "views/footer.php";?>