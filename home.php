<?php
/**
 * home template
 */

include "views/header.php";
require_once 'classCat.php';
require_once 'classUtility.php';
require_once 'classValidation.php';


$newCat_class = new \Cat\Cat('12');//@todo remove need to pass in name
$approvedGenders = $newCat_class->setAllowedGenders();
$approvedColors = $newCat_class->setAllowedColorings();
$approvedMoods = $newCat_class->setApprovedMood();
$approvedHairLength = $newCat_class->checkIsHairLengthApproved();

$time = \Cat\Utility::getDateTime();

if (isset($_POST['create_cat'])) {
    $newCatData[1] = $_POST['cat_name'];
    $newCatData[2] = $_POST['cat_age'];
    $newCatData[3] = $_POST['cat_weight'];
    $newCatData[4] = $_POST['cat_gender'];
    $newCatData[5] = $_POST['cat_color'];
    $newCatData[6] = $_POST['cat_mood'];
    $newCatData[7] = $_POST['cat_hair_length'];
    $newCatData[8] = $_POST['cat_has_catitude'];

    $newCatDatabaseRecord = [
        'catName' => $newCatData[1],
        'age' => $newCatData[2],
        'gender' => $newCatData[4],
        'createTime' => $time,
        'coloring' => $newCatData[5],
        'hairLength' => $newCatData[7],
        'currentMood' => $newCatData[6],
        'weight' => $newCatData[3],
        'hasCatittude' => $newCatData[8],
    ];

    new Validation($newCatDatabaseRecord);
}
$newCat_class->addCatRecord($newCatDatabaseRecord);

if (!empty($error_message)) : ?>
<div id="error"><p>Error: <?=$error_message?></p></div>
<?php endif; ?>
    <h2 class="page_heading">Create Your New Cat</h2>
<form id="new_cat_form" name="cat_creation" method="post">
    <div class="entry">
        <label>Cat Name</label>
        <input type="text" name="cat_name" value="<?=$newCatData[1]?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Age</label>
        <input type="number" name="cat_age" value="<?=$newCatData[2]?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Weight</label>
        <input type="number" name="cat_weight" value="<?=$newCatData[3]?>" maxlength="30" size="8" />
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
        <input type="submit" value="Create Cat Now" id="submit" name="create_cat" />
    </div>
    <input type="hidden" name="cat_has_catitude" value="0" />
</form>

<?php include "views/footer.php";?>