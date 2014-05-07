<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="../chopine/css/styleAcc.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
<?php
session_start();
session_unset();
session_destroy();
header ('location: index.php');
?>
</body>
