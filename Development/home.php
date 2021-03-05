<?php 
    include_once 'header.php';
    require_once 'includes/functions.inc.php';
    require_once 'includes/dbh.inc.php';

    $userId = $_SESSION['userid'];
    $userInfo = getHomePageUserInfo($conn, $userId);
    $usersName = $userInfo['usersName'];
    $usersUid = $userInfo['usersUid'];
    $usersEmail = $userInfo['usersEmail'];
    $googleDriveConnected = "";

    // Get homepage cloud service info
    $row = getHomePageGoogleDriveInfo($conn, $userId);
    if ($row != false) { 
        if ($row['serviceType'] == 'Google_Drive') {
            $googleDriveConnected = "Connected";
        }
    } else {
        echo "here";
        exit;
    }

    
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
                        <form action="includes/edituserinfo.inc.php" method="post">
                            <h1> Account Info </h1>
                            <h3> Name: <?php echo $usersName ?></h3>
                            <hr>
                            <h3> Username: <?php echo $usersUid ?></h3>
                            <hr>
                            <h3> Email: <?php echo $usersEmail ?></h3>
                            <hr>
                            <div class="btn-edit">
                                <button type="submit" name="edit">edit</button>
                            </div>
                            
                        </form>
					</div> 

					<div class="box-cell cloud-services"> 
                        <h1> Cloud Services </h1>
                        <div class="cloud-service">
                            <form action="profile.inc.php">
                                <h3> Google Drive </h3>
                            </form>
                            <div class="connection-status">
                                <h3> <?php echo $googleDriveConnected ?> </h3>
                            </div>
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
                            <form action="includes/cloud_services_oauth.inc.php" method="post">
                                <div class="btn-connect">
                                    <input type="submit" name="googledriveconnect" value="Connect"></input>
                                </div>
                                <div class="btn-disconnect">
                                    <button type="disconnect">X</button>
                                </div>
                            </form>
                        </div>

                        <div class="btn-onedrive">
                            <form action="includes/cloud_services_oauth.inc.php" method="post">
                                <div class="btn-connect">
                                    <input type="submit" name="onedriveconnect" value="Connect"></input>
                                </div>
                                <div class="btn-disconnect">
                                    <button type="disconnect">X</button>
                                </div>
                            </form>
                        </div>

                        <div class="btn-dropbox">
                            <form action="includes/cloud_services_oauth.inc.php" method="post">
                                <div class="btn-connect">
                                    <input type="submit" name="dropboxconnect" value="Connect"></input>
                                </div>
                                <div class="btn-disconnect">
                                    <button type="disconnect">X</button>
                                </div>
                            </form>
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


