<?php
header ('location: identification.php');
session_start();
$_SESSION['login']=$_POST['login'];
$_SESSION['mdp']=md5($_POST['mdp']);
?>
