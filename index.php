<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
session_start();
session_unset();
session_destroy();
?>
<head>
<link href="../chopsub/css/StyleIndex.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
<div id=header>
	<div id=banniere>
		<img src="images/banniere.jpg" />
	</div>
</div>
<div id=page>
	<div id=titre>
		CONNEXION
	</div>
	<form action="ConnectIdenti.php" method="post">
		<div id=login>
			<div id=text> login :</div>
			<div id=saisie> <input type="text" name="login" /> </div>
		</div>
		<div id=mdp>
			<div id=text1> mot de passe : </div>
			<div id=saisie1> <input type="password" name="mdp" /> </div>
		</div>
		<div id=Lbouton>
			<div id=bouton>
				<input type="submit" value="connexion" id="bouton1"/>
			</div>
		</div>
	</form>
</div>
