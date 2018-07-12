<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
error_reporting(E_ALL);
?>
<head>
<link href="../chopsub/css/StyleAffichComm.css" rel="stylesheet" media="all" type="text/css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
		Vous n'avez pas passé de commande
	<div id=footer2>
			<div id=boutonErr onclick="self.location.href='identification.php'">
				ACCUEIL	
			</div>
	</div>
</div>

<?php
}else
{
$menu1->closeCursor();
$menu2 = $bdd->query("SELECT * FROM commande where nom='".$login."'");
$donnees2 = $menu2->fetch();
?>
	<div id=text>
	Voici le résumé de votre commande
	</div>
	<div class=ligne1>
		<div class=col1> PAIN :</div>
		<div class=col2> <?php echo $donnees2['pain']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> TAILLE :</div>
		<div class=col2> <?php echo $donnees2['taille']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> VIANDE :</div>
		<div class=col2> <?php echo $donnees2['viande']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> FROMAGE :</div>
		<div class=col2> <?php echo $donnees2['fromage']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> TEMPERATURE :</div>
		<div class=col2> <?php echo  $donnees2['temperature']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> SAUCE :</div>
		<div class=col2> <?php echo  $donnees2['sauce']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> LEGUMES :</div>
		<div class=col2> <?php echo  $donnees2['legume1']; ?> </div>
	</div>
	<?php if ($donnees2['legume2']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume2'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume3']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume3'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume4']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume4'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume5']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume5'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume6']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume6'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume7']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume7'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume8']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume8'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume9']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume9'];
			echo"</div>";
		echo "</div>";
	}
	 if ($donnees2['legume10']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo  $donnees2['legume10'];
			echo"</div>";
		echo "</div>";
	}

?>
	<div class=ligne1>
		<div class=col1> PRIX:</div>
		<div class=col2> <? echo $donnees2['prix']; ?> euros </div>
	</div>
	
<div id=footer>
			<div id=bouton1 onclick="self.location.href='identification.php'">
				ACCUEIL
			</div>
			<div id=bouton1 onclick="self.location.href='suppcomm.php'">
				SUPPRESSION
			</div>
</div>

<?php
echo "</div>";
}
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
