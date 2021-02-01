<?php 
    include_once 'header.php';
?>

    <div class="intro-index">
        <?php
            if (isset($_SESSION["useruid"])) {
                echo "<p>Hello, " . $_SESSION["useruid"] . "</p>";
            }
        ?>
        <!-- <h1>Welcome to EZ-Drive</h1> -->
        <!-- <p> EZ-Drive is a platform for uploading your files to your favorite cloud services all in one</p> -->
    </div>

    <div class="container-home"> 
			<div class="box"> 

				<div class="box-row"> 

					<div class="box-cell account-info"> 
                        <form action="edituserinfo.inc.php">
                            <h1> Account Info </h1>
                            <h3> Name: Grant Galinger</h3>
                            <hr>
                            <h3> Username: grg </h3>
                            <hr>
                            <h3> Email: grant.galinger@gmail.com </h3>
                            <hr>
                            <div class="btn-edit">
                                <button type="submit" name="edit">edit</button>
                            </div>
                            <div class="btn-reset-pwd">
                                <button type="submit" name="pwd">reset password</button>
                            </div>
                        </form>
					</div> 

					<div class="box-cell cloud-services"> 
                        <h1> Cloud Services </h1>
                        <div class="cloud-service">
                            <form action="profile.inc.php">
                                <h3> Google Drive </h3>
                            </form>
                            <h3> grant.galinger@gmail.com </h3>
                        </div>
                        <div class="cloud-service">
                            <form action="profile.inc.php">
                                <h3> OneDrive </h3>
                            </form>
                            <h3> awaiting connection </h3>
                        </div>
                        <div class="cloud-service">
                            <form action="profile.inc.php">
                                <h3> Dropbox </h3>
                            </form>
                            <h3> awaiting connection </h3>
                        </div>
                    </div>
                     
                    <div class="box-cell statuses">
                        <h1> Status </h1>
                        <div class="btn-google-drive">
                            <div class="btn-connect">
                                <button type="connect">Connect</button>
                            </div>
                            <div class="btn-disconnect">
                                <button type="disconnect">X</button>
                            </div>
                        </div>
                        <div class="btn-onedrive">
                            <div class="btn-connect">
                                <button type="connect">Connect</button>
                            </div>
                            <div class="btn-disconnect">
                                <button type="disconnect">X</button>
                            </div>
                        </div>
                        <div class="btn-dropbox">
                            <div class="btn-connect">
                                <button type="connect">Connect</button>
                            </div>
                            <div class="btn-disconnect">
                                <button type="disconnect">X</button>
                            </div>
                        </div>
                    </div>
                    
				</div> 
                
			</div> 

		</div> 

        <div class="btn-upload">
            <a href="upload.php"><button type="upload">Go to Uploads</button></a>
        </div>
    </div>



<?php 
    include_once 'footer.php';
?>


