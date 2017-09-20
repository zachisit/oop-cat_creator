/**
 * Main.js
 *
 * All js related to theme
 */

jQuery(document).ready(function($) {
    $("#cat_list").tablesorter({
        headers: {
            '.no_sort' : {
                sorter: false
            }
        }
    });
});
