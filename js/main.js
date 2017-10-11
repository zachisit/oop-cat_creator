/**
 * Main.js
 *
 * All js related to theme
 */

jQuery(document).ready(function($) {
    /*table sorter*/
    $("#cat_list").tablesorter({
        headers: {
            '.no_sort' : {
                sorter: false
            }
        }
    });

    /*delete cat from table sorter*/
    $( "#delete_cat" ).click(function() {
        /*
         jQuery.ajax({
         url: url,
         type: method,
         dataType: type,
         data: data,
         success: callback
         });
         */
        $.ajax({
            url: '/deleteCat.php',
            type: 'DELETE',
            success: function(){
                alert('cat deleted');
            }
        });

        return false;
    });
});
