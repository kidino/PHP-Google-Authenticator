<?php

/*
    GAuth Demo
    
    Authour: Iszuddin Ismail
    
    Testing out implementation of Google Authenticator for login. This demo
    uses Google Authenticator library from PHPGangsta
    
    https://github.com/PHPGangsta/GoogleAuthenticator
    
*/

require_once 'gauth.php';
$ga = new GoogAuth();

$email = (isset($_POST['email'])) ? strtolower(trim($_POST['email'])) : false;
$code = (isset($_POST['code'])) ? strtolower(trim($_POST['code'])) : false;
$action =  (isset($_GET['action'])) ? strtolower(trim($_GET['action'])) : '' ;

$app_name = "JOMWEB";

// part3 -- test the code againsts Google Authenticator
if ($action == 'part3') {
    if (!file_exists(md5($email))) { show_error("unknown account"); }
    if (!$code) { show_error("code cannot be empty"); }
    
    $secret_key = file_get_contents(md5($email));
    $oneCode = $ga->getCode($secret_key);
    $checkResult = $ga->verifyCode($secret_key, $oneCode, 2);    // 2 = 2*30sec clock tolerance
    
    if ($checkResult) {
        echo "Congratulations! Login successful.";
    } else {
        show_error("Wrong code. Please try again.");    
    }

// if registered, request for code, if not, register user
} elseif ($action == 'part2') {
    if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (file_exists(md5($email))) { // registered in the past
            echo "Enter the code for $app_name from Google Authenticator<br>";
            echo "<form action='login.php?action=part3' method='post'>";
            echo "<input type='text' name='email' value='$email' readonly /><br />";
            echo "<input type='text' name='code' /><br />";
            echo "<button type='submit'>SUBMIT</button>";
            echo "</form>";

        } else { // new registration
            $secret_key = $ga->createSecret();
            file_put_contents(md5($email), $secret_key);
            echo "This is your first time using $app_name.<br/>";
            echo "Scan the QR code below with Google Authenticator app.<br/>";
            $qrCodeUrl = $ga->getQRCodeGoogleUrl($email.'-'.$app_name, $secret_key);
            echo "<img src='$qrCodeUrl' /><br />";
            echo "or enter this code manually into Google Authenticator : $secret_key<br/>";
            echo "When you are ready, click the button below.<br />";
            echo "<form action='login.php?action=part2' method='post'>";
            echo "<input type='hidden' name='email' value='$email' />";
            echo "<button type='submit'>CONTINUE</button>";
            echo "</form>";
        }
    } else {
        show_error("invalid email format");
    }
} else {
    echo "Enter email address to proceed with login.";
    echo "<form action='login.php?action=part2' method='post'>";
    echo "<input type='text' name='email' value='' />";
    echo "<button type='submit'>LOGIN</button>";
    echo "</form>";    
}

function show_error($errmessage){
    echo $errmessage.'<br/>';
    echo '<a href="login.php">Got Back Home</a>';
}