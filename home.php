<?php
/**
 * home template
 */

include "views/header.php";
include 'classCat.php';
include 'classUtility.php'; ?>
<?php
$today_time = date('Y-m-d h:i');

$newCat_class = new \Cat\Cat('12');//@todo remove need to pass in name
$approvedGenders = $newCat_class->setAllowedGenders();
$approvedColors = $newCat_class->setAllowedColorings();
$approvedMoods = $newCat_class->setApprovedMood();
$approvedHairLength = $newCat_class->checkIsHairLengthApproved();

$newUtility = new \Cat\Utility();
$time = $newUtility->getDateTime();


$newCatData = [];

if (isset($_POST['create_cat'])) {
    $newCatData[1] = $_POST['cat_name'];
    $newCatData[2] = $_POST['cat_age'];
    $newCatData[3] = $_POST['cat_weight'];
    $newCatData[4] = $_POST['cat_gender'];
    $newCatData[5] = $_POST['cat_color'];
    $newCatData[6] = $_POST['cat_mood'];
    $newCatData[7] = $_POST['cat_hair_length'];

    //error block
    if ( !($newCatData[1]) ) {
        $error_message = 'Missing value in an input field.';
    }
}

//var_dump($newCatData);

$newCatDatabaseRecord = [
    'catName' => $newCatData[1],
    'age' => $newCatData[2],
    'gender' => $newCatData[4],
    'createTime' => $time,
    'coloring' => $newCatData[5],
    'hairLength' => $newCatData[7],
    'currentMood' => $newCatData[6],
    'weight' => $newCatData[3],
    'hasCatittude' => 0,
    //'id' => '13'
];

$newCat_class->addCatRecord($newCatDatabaseRecord);

?>
<?php if (!empty($error_message)) : ?>
<div id="error"><p>Error: <?=$error_message?></p></div>
<?php endif; ?>

<form id="new_cat_form" name="cat_creation" method="post">
    <div class="entry">
        <label>Cat Name</label>
        <input type="text" name="cat_name" value="<?=$newCatName?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Age</label>
        <input type="number" name="cat_age" value="<?=$newCatAge?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Weight</label>
        <input type="number" name="cat_weight" value="<?=$newCatWeight?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Gender</label>
        <select name="cat_gender">
            <option value="Select A Gender">Select A Gender</option>
        <?php foreach ($approvedGenders as $key => $val) :
            echo "<option value='".$key."'>".$key."</option>";
         endforeach; ?>
        </select>
    </div>
    <div class="entry">
        <label>Color</label>
        <select name="cat_color">
            <option value="Select A Color">Select A Color</option>
            <?php foreach ($approvedColors as $key => $val) :
                echo "<option value='".$key."'>".$key."</option>";
            endforeach; ?>
        </select>
    </div>
    <div class="entry">
        <label>Current Mood</label>
        <select name="cat_mood">
            <option value="Select A Mood">Select A Mood</option>
            <?php foreach ($approvedMoods as $key => $val) :
                echo "<option value='".$key."'>".$key."</option>";
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
    <input type="hidden" name="hid-submit" value="1" />
</form>

<?php include "views/footer.php";?>