<?php
    include_once 'header.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';

    

    // Display summary of files uploaded
    // Not sure what file attributes we will be able to display
    //  - at the very least the name

    // Once files are displayed we can clear the uploads folder

    // TODO: figure out why this isnt being called
    clearUploads();
    array_map('unlink', array_filter( 
        (array) array_merge(glob("uploads/*")))
    ); 
?>

    
<?php 
    include_once 'footer.php';
?>
