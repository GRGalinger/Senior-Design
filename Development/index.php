<?php 
    include_once 'header.php';
?>

    <section class="index-intro">

        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<p>Hello, " . $_SESSION["useruid"] . "</p>";
            }
        ?>

        <h1>Welcome to EZ-Drive</h1>
        <p> EZ-Drive is a platform for uploading your files to your favorite cloud services all in one</p>
    
    </section>




<?php 
    include_once 'footer.php';
?>


