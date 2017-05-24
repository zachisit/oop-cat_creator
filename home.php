<?php
/**
 * home template
 */

include "views/header.php";
?>
<div id="error"><?php //error messages here ?></div>
<form name="cat_creation" action="" method="post">
    <div class="entry">
        <label>Cat Name</label>
        <input type="text" name="cat_name" value="<?php //value here ?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Weight</label>
        <input type="text" name="cat_weight" value="<?php //value here ?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Gender</label>
        <input type="text" name="cat_gender" value="<?php //value here ?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Color</label>
        <input type="text" name="cat_color" value="<?php //value here ?>" maxlength="30" size="8" />
    </div>
    <div class="entry">
        <label>Current Mood</label>
        <input type="text" name="cat_mood" value="<?php //value here ?>" maxlength="30" size="8" />
        <div class="entry">
            <label>Hair Length</label>
            <input type="text" name="cat_hairlength" value="<?php //value here ?>" maxlength="30" size="8" />
        </div>
    </div>

    <div class="entry">
        <input type="submit" value="Create Cat Now" id="submit" />
    </div>
    <input type="hidden" name="hid-submit" value="1" />
</form>
<?php
include "views/footer.php";
?>