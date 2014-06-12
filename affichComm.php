<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="../chopsub/css/StyleAffichComm.css" rel="stylesheet" media="all" type="text/css">
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
	<?php
	$connection->closeCursor();
	?>




<div id=page>
	<?php
	$menu1 = $bdd->query("SELECT COUNT(*) as com FROM commande where nom='".$login."'");
	$donnees1 = $menu1->fetch();
	if ($donnees1['com']==0) {
	?>
		Vous n'avez pas passe de commande
	<div id=footer>
			<div id=boutonErr onclick="self.location.href='identification.php'">
				ACCUEIL	
			</div>
	</div>
</div>

<?php
}else
{
$menu1->closeCursor();
echo "<b>Ma Commande</b>";
$menu2 = $bdd->query("SELECT * FROM commande where nom='".$login."'");
$donnees2 = $menu2->fetch();
echo "</div>";
}
?>



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
			</br>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				RETOUR	
			</div>
		</div>		

	<?php
}	
$connection2->closeCursor();
?>





</body>
</html>
