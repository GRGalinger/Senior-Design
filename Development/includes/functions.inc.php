<?php 

function emptyInputsSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else { $result = false; }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else { $result = false; }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else { $result = false; }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else { $result = false; }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) 
        VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputsLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else { $result = false; }
    return $result;
}

function loginUser($conn, $username, $pwd) {
    
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    // Password user provided is not the same as the password in the db
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        
        clearUploads();
        header("location: ../home.php");
        // exit();

    }
}

function clearUploads(){
    array_map('unlink', array_filter( 
        (array) array_merge(glob("../uploads/*")))
    ); 
}

function clearCredentialsJson(){
    $file_pointer = "credentials.json";  
    unlink($file_pointer);
}

function insertCredentials($conn, $usersId, $accessToken, $expires, $scope, $tokenType, $created, $refreshToken) {
    $sql = "INSERT INTO google_credentials (usersId, accessToken, expires, scope, tokenType, created, refreshToken) 
        VALUES (?, ?, ?, ?, ?, ?, ?);";
    
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../signup.php?error=stmtfailed");
        echo "failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isissis", $usersId, $accessToken, $expires, $scope, $tokenType, $created, $refreshToken);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //header("location: ../signup.php?error=none");
}

function getUserCredentials($conn, $usersId){
    $sql = "SELECT * FROM google_credentials WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../signup.php?error=stmtfailed"); // TODO: This header needs changed
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $usersId);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    // If row is returned, then the logged in user aligns with the credentials file
    if ($row = mysqli_fetch_assoc($resultsData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else { 
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }

}

function verifyCredentials($conn, $usersId, $accessToken){
    $sql = "SELECT * FROM google_credentials WHERE usersId = ? AND accessToken = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../signup.php?error=stmtfailed"); // TODO: This header needs changed
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $usersId, $accessToken);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    // If row is returned, then the logged in user aligns with the credentials file
    if ($row = mysqli_fetch_assoc($resultsData)) {
        // var_dump($row);
        // exit();
        mysqli_stmt_close($stmt);
        return $row;
    } else { 
        $result = false;
        echo "not the same";
        // exit();
        mysqli_stmt_close($stmt);
        return $result;
    }
}

// IM HERE ---- --- --- ---Working on getting the sql statement to execute //
function updateAccessToken($conn, $usersId, $accessToken){
    $sql = "UPDATE google_credentials SET accessToken = ? WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //header("location: ../signup.php?error=stmtfailed"); 
        echo "failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $accessToken, $usersId);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
}

function checkAccessToken($conn, $created, $expires){
    $currentTime = time();
    if (($currentTime - $created) >= $expires){
        // access token is expired
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
}

function isAccessTokenExpired($conn, $usersId){
    $sql = "SELECT expires, created FROM google_credentials WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed"); // TODO: This header needs changed
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $usersId);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {

        $expires = $row['expires'];
        $created = $row['created'];
        //var_dump($row);

        $currentTime = time();

        if (($currentTime - $created) >= $expires){
            // access token is expired
            $result = true;
            mysqli_stmt_close($stmt);
            return $result;
        } else {
            $result = false;
            mysqli_stmt_close($stmt);
            return $result;
        }
    } else { 
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }

    
}