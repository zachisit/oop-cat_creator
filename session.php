<?php
/**
 * session.php
 * validate and store user session value
 */

if(!empty($_SESSION['uid']))
{
    $session_uid=$_SESSION['uid'];
    include('userClass.php');
    $userClass = new \Cat\userClass();
}
if(empty($session_uid))
{
    //$url=BASE_URL.'index.php';
    $url = 'home.php';
    header("Location: $url");
}