<?php
/**
 * session.php
 * validate and store user session value
 */

if(!empty($_SESSION['uid']))
{
    $session_uid=$_SESSION['uid'];
    include('userClass.php');
    $userClass = new userClass();
}
if(empty($session_uid))
{
    $url=BASE_URL.'index.php';
    header("Location: $url");
}