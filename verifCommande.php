<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
	<link href="../chopsub/css/StyleVerifComm.css" rel="stylesheet" media="all" type="text/css">
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

/**********************************************************
Verification du login mdp
***********************************************************/

$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();

/***********************************************************
Si login OK
***********************************************************/

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
/********************************************************
SI Commande deja passe
********************************************************/
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
/********************************************************
Si pas de commande Affichage de la page
*********************************************************/

echo $_POST['pain'];
echo $_POST['taille'];
echo $_POST['viande'];  
echo $_POST['fromage'];  
echo $_POST['temperature'];  
echo $_POST['sauce'];  
echo $_POST['legume1'];  
echo $_POST['legume2'];  
echo $_POST['legume3'];  
echo $_POST['legume4'];  
echo $_POST['legume5'];  
echo $_POST['legume6'];  
echo $_POST['legume7'];  
echo $_POST['legume8'];  
echo $_POST['legume9'];  
echo $_POST['legume10'];  

}

}
else {
?>
<!--***************************************************
Si erreur de login
****************************************************--!>
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
