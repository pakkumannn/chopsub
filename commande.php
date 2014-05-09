<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="../chopsub/css/StyleComm.css" rel="stylesheet" media="all" type="text/css">
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
<div id=page>

<?php
$connection->closeCursor();
$menu1 = $bdd->query("SELECT COUNT(*) as com FROM commande where nom='".$login."'");
$donnees1 = $menu1->fetch();
if ($donnees1['com']!=0) {
        echo "Vous avez deja passe commande";
        echo "</duv>";
        echo "<div id=footer>";
        echo    "<a href='identification.php'> <input type='button' value='Accueil'></a>";
        echo "</div>";
}else
{
$menu1->closeCursor();
echo allo;
?>
        <div id=formulaire>
        <form action="verifPerso.php" method="post">

        <a href="identification.php"> <input type="button" value="Accueil"></a>
        <input type="submit" value="Valider">
	</form>
	</div>

<?php
}
?>
</div>
</body>
</html>
























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
<?php } ?>
</body>
</html>
