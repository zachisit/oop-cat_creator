<?php
include_once('userClass.php');

$userLogin = new \Cat\userClass();

$successMessage = '';//not needed once we do redirecting, used to test
$errorMsgLogin = '';

if (!empty($_POST['loginSubmit'])) {
    $username = $_POST['usernameEmail'];
    $password = $_POST['password'];
    //$url=BASE_URL.'home.php';
    $url = 'home.php';
    echo $username;
    echo $password;

    if(strlen(trim($username))>1 && strlen(trim($password))>1 ) {
        $uid = $userLogin->userLogin($username, $password);

        if ($uid) {
            $successMessage = 'Your username or password is correct. Yay';
            header("Location: $url"); //send to home after login success
        } else {
            $errorMsgLogin = 'Your username or password is not correct.';
        }
    }
} ?>
<?=$successMessage?>
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