<?php
/**
 * edit template
 */

include "views/header.php";
require_once 'classCat.php';
require_once 'classUtility.php';
require_once 'classValidation.php';


$newCat_class = new \Cat\Cat();
$approvedGenders = $newCat_class->setAllowedGenders();
$approvedColors = $newCat_class->setAllowedColorings();
$approvedMoods = $newCat_class->setApprovedMood();
$approvedHairLength = $newCat_class->checkIsHairLengthApproved();

$time = \Cat\Utility::getDateTime();
/*
 * have function inside cat class called fromID
 * so cat = Cat::fromID
 * inside ID pass in id i am editing
 *
 * now we have cat object
 * now we can hve function o update, Cat::uipdate(pass in post array).
 *
 * have another function called catSave --- updates/inserts cat in DB
 * dsim - fromID, save functions -0 look how they work
 */
//get id of record from url
$catId = $_GET['id'];
$currentCatData = $newCat_class->getSingleCatByID($catId);
//var_dump($currentCatData);

$existing_cat_data = [];

if (isset($_POST['update_cat'])) {
    $newCatData[1] = $_POST['cat_name'];
    $newCatData[2] = $_POST['cat_age'];
    $newCatData[3] = $_POST['cat_weight'];
    $newCatData[4] = $_POST['cat_gender'];
    $newCatData[5] = $_POST['cat_color'];
    $newCatData[6] = $_POST['cat_mood'];
    $newCatData[7] = $_POST['cat_hair_length'];
    $newCatData[8] = $_POST['cat_has_catitude'];

    $existingCatDatabaseRecord = [
        'catName' => $newCatData[1],
        'age' => $newCatData[2],
        'gender' => $newCatData[4],
        'createTime' => $time,
        'coloring' => $newCatData[5],
        'hairLength' => $newCatData[7],
        'currentMood' => $newCatData[6],
        'weight' => $newCatData[3],
        'hasCatittude' => $newCatData[8],
        //@TODO: remove create time as not needed when updating
        //@TODO: create 'updated' column in db, with timestamp passed in, to show when record last updated - used only in editing records
    ];

    new Validation($existingCatDatabaseRecord);
}

$newCat_class->editCatRecord($existingCatDatabaseRecord, $catId);

if (!empty($error_message)) : ?>
    <div id="error"><p>Error: <?=$error_message?></p></div>
<?php endif; ?>
    <h2 class="page_heading">Edit <?=$currentCatData['catName']?> Cat</h2>
    <form id="new_cat_form" name="cat_creation" method="post">
        <div class="entry">
            <label>Cat Name</label>
            <!--$catID->catName:: SHOULD BE THIS-->
            <input type="text" name="cat_name" value="<?=$currentCatData['catName']?>" maxlength="30" size="8" />
        </div>
        <div class="entry">
            <label>Age</label>
            <input type="number" name="cat_age" value="<?=$currentCatData['age']?>" maxlength="30" size="8" />
        </div>
        <div class="entry">
            <label>Weight</label>
            <input type="number" name="cat_weight" value="<?=$currentCatData['weight']?>" maxlength="30" size="8" />
        </div>
        <div class="entry">
            <label>Gender</label>
            <select name="cat_gender">
                <option value="Select A Gender">Select A Gender</option>
                <?php foreach ($approvedGenders as $key => $val) :
                    $option = '<option value="'.$key.'"';
                    $option .= ($key == $newCatData[4]) ? ' selected' : '';
                    $option .= ">{$key}</option>";
                    echo $option;
                endforeach; ?>
            </select>
        </div>
        <div class="entry">
            <label>Color</label>
            <select name="cat_color">
                <option value="Select A Color">Select A Color</option>
                <?php foreach ($approvedColors as $key => $val) :
                    $option = '<option value="'.$key.'"';
                    $option .= ($key == $newCatData[5]) ? ' selected' : '';
                    $option .= ">{$key}</option>";
                    echo $option;
                endforeach; ?>
            </select>
        </div>
        <div class="entry">
            <label>Current Mood</label>
            <select name="cat_mood">
                <option value="Select A Mood">Select A Mood</option>
                <?php foreach ($approvedMoods as $key => $val) :
                    $option = '<option value="'.$key.'"';
                    $option .= ($key == $newCatData[6]) ? ' selected' : '';
                    $option .= ">{$key}</option>";
                    echo $option;
                endforeach; ?>
            </select>
        </div>
        <div class="entry">
            <label>Hair Length</label>
            <select name="cat_hair_length">
                <option value="Select A Hair Length">Select A Hair Length</option>
                <?php foreach ($approvedHairLength as $key => $val) :
                    echo "<option value='".$val."'>".$val."</option>";
                endforeach; ?>
            </select>
        </div>
        <div class="entry">
            <label>Does Cat Have Catitude?</label>
            <input type="number" name="cat_has_catitude" value="0" maxlength="30" size="8" />
    <!--<select name="cat_has_catitude">
        <option value="Select Yay or Nay">Select Yay or Nay</option>
        <option value="0">Nope</option>
        <option value="1">Yass</option>
    </select>-->
        </div>

<div class="entry">
    <input type="submit" value="Update This Cat" id="submit" name="update_cat" />
</div>
</form>

<?php include "views/footer.php";?>