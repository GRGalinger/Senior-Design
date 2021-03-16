<?php
    include_once 'header.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';

    //This is next on the TODO: list
    // Display summary of files uploaded
    // Not sure what file attributes we will be able to display
    //  - at the very least the name

    // Display links with logo for each of the cloud services




    
    // Once files are displayed we can clear the uploads folder
    array_map('unlink', array_filter( 
        (array) array_merge(glob("uploads/*")))
    ); 
?>

    
<?php 
    include_once 'footer.php';
?>
