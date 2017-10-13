<html>
<head>
    <title>Cat Creator v0.0.1</title>
    <!--theme css-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--jquery-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--theme js-->
    <script type="text/javascript" src="js/main.js"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--tablesorter-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.widgets.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/css/theme.default.min.css">
</head>
<body>
<div id="header">
    <ul id="navigation">
        <li><a href="index.php" title="home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li><a href="home.php" title="add new cat"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
    </ul>
</div>

<?php
//include_once('/www-data/sandboxes/zsmith/web/content/cat_creator/session.php');

//include_once('../userClass.php');//should be removed when session.php works
//$userClass = new \Cat\userClass();//should be removed when session.php works

//@TODO:create userLogin object, used below to get name
//include_once('../userClass.php');//should be removed when session.php works
//$userClass = new \Cat\userClass();//should be removed when session.php works
//$userDetails = $userClass->userDetails($uid);

session_start();
$_SESSION['test'] = '343';
echo $_SESSION['test'];
?>
<!--<h1>Welcome <?//=$userDetails->name; ?></h1>-->