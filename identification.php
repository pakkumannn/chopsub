<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="../chopsub/css/StyleIdenti.css" rel="stylesheet" media="all" type="text/css">
</head>

<body>
<!--***********************************************************
		ajout des variable de session
************************************************************--!>
<?php
session_start();
if(isset($_SESSION['login']))
{
	$login=$_SESSION['login'];
	$mdp=$_SESSION['mdp'];
}
/*else
{
	$login=$_POST['login'];
	$mdp=md5($_POST['mdp']);
	$_SESSION['login']=$_POST['login'];
	$_SESSION['mdp']=md5($_POST['mdp']);
}*/

$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();
if ($donnees1['nb1']==1) {
	?>
<div id=header>
	<div id=banniere>
		<img src="images/banniere.jpg" />
	</div>
	<div id=connexion>
		<?php
		session_start();
	if(isset($_SESSION['login']))
	{
		$login=$_SESSION['login'];
	}
	echo 'login : '.$login.'';	
	?>
	</div>
	<div id=deco>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				deconnexion	
			</div>
	</div>
</div>
<div id=page>
	<div id=MenuP>
		<div id=Option1>
			<div id=bouton1 onclick="self.location.href='commande.php'">
				commander
			</div>
		</div>
		<div id=Option2>	
			<div id=bouton2 onclick="self.location.href='commande.php'">
				visualiser ma commande
			</div>
		</div>
	</div>
	<?php
	$connection->closeCursor();
	$connection2 = $bdd->query("SELECT admin FROM identi where login='".$login."' AND mdp='".$mdp."'");
	$donnee2 = $connection2->fetch();
	if ($donnee2['admin']==1) {
	?>
	<div id=MenuA>
		<div id=Option3>
			<div id=bouton1 onclick="self.location.href='commande.php'">
				Impression PDF
			</div>
		</div>
		<div id=Option4>
			<div id=bouton1 onclick="self.location.href='commande.php'">
				Creer un compte	
			</div>
		</div>
	</div>
	<?php
		}
	?>
</div>


		<?php
}
else {
	?>
		<div id=header>
			<div id=banniere>
			<img src="images/banniere.jpg" />
			</div>
 		</div>
		<div id=page>
			<div id=text>
			Erreur sur le mdp ou le login
			</div>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				deconnexion	
			</div>
		</div>		

	<?php
}	

$connection2->closeCursor();
?>
</body>
</html>