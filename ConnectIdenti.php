<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link href="../chopine/css/styleAcc.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
<?php
session_start();
$_SESSION['login']=$_POST['login'];
$_SESSION['mdp']=md5($_POST['mdp']);
header ('location: identification.php');
?>
</body>
