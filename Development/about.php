<?php 
	include_once 'header.php'; 
?>

<div class="container-about">
    <h1> What is EZ-Drive? </h1>
    <p> EZ-Drive is web application designed to help you easily upload files to your favorite cloud services all from one
        convenient place.
        We currently offer connection to Google Drive, Dropbox, and OneDrive services.
        This application was designed by Grant Galinger, Josh Phillips, and Kyle Spraggins for our senior design project. 
        If you wish to learn more, please visit our 
        <a href="https://github.com/GRGalinger/SeniorDesign" target="_blank">Github repository</a>.
    </p>
    <h1> How does it work? </h1>
    <p> EZ-Drive works by utilizing the public API libraries for each of the cloud services. 
        These APIs allow us to form a connection between this application and your specific cloud service account. 
        The connection is based around the principles of OAuth 2.0 Authorization. 
        Once the user has selected the files they wish to upload through our easy to use drag and drop interface, 
        they are securely backed up to your preferred cloud service.
        For the full User Documentation, view our <a href="https://github.com/GRGalinger/SeniorDesign/blob/master/Files/Assignments/User_Documentation.md" target="_blank">User Documentation</a> 
        inside our repository.
    </p>
     

</div>










<?php 
    include_once 'footer.php';
?>