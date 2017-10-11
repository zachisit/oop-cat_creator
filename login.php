<div id="login">
    <h1>Login</h1>
    <form method="post" action="" name="login">
        <label>Username or Email</label>
        <input type="text" name="usernameEmail" autocomplete="off" />
        <label>Password</label>
        <input type="password" name="password" autocomplete="off"/>
        <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
        <input type="submit" class="button" name="loginSubmit" value="Login">
    </form>
</div>