<?php
/**
 * session.php
 * validate and store user session value
 */

//session_start(); //would i start session on this page?

/*
 * hav session class, checks session login
 * getCurrentUser
 * isSessionValid
 * logIn
 * logOut
 *
 * hv euser class, hav sesion class
 *
 * user class:
 * maniuplating the user object
 *
 * session class:
 * manipulating the session object
 */
if (!empty($_SESSION['uid'])) {
    $session_uid=$_SESSION['uid'];
    require_once('userClass.php');
    $userClass = new \Cat\userClass();
}
if (empty($session_uid)) {
    $url=BASE_URL.'login.php';
    header("Location: $url");
}