<?php
require_once 'config.php';
include_once('userClass.php');
include_once('classUtility.php');

session_start();

$userLogin = new \Cat\userClass();
$timeStamp = \Cat\Utility::getDateTime();

$errorMsgLogin = '';

if (!empty($_POST['loginSubmit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $url=BASE_URL.'index.php';

    if (isset($username) || isset($password)) {
        $uid = $userLogin->userLogin($username, $password);

        if ($uid) {
            header("Location: $url");

        } else {
            $errorMsgLogin = 'Your username or password is not correct.';
            error_log('incorrect login for: '. $username . 'at '. $timeStamp, 0);
            //@TODO:create alertAdmin class that sends email
            //to admin, and email admin when someone can't login
        }
    } else {
        $errorMsgLogin = 'Missing username or password';
    }
} ?>
<div id="login">
    <h1>Login</h1>
    <form method="post" action="" name="login">
        <label>Username</label>
        <!--@TODO: could swap this out to be username OR email and update query
        to check username OR email when logging in-->
        <input type="text" name="username" autocomplete="off" />
        <label>Password</label>
        <input type="password" name="password" autocomplete="off"/>
        <div class="errorMsg"><?=$errorMsgLogin; ?></div>
        <input type="submit" class="button" name="loginSubmit" value="Login">
    </form>
</div>