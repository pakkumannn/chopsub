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
si commande deja passe
********************************************************/
$menu1 = $bdd->query("select count(*) as com from commande where nom='".$login."'");
$donnees1 = $menu1->fetch();
if ($donnees1['com']!=0) {
	?>	
	<div id=page>
			<div id=text>
				vous avez deja passe une commande
			</div>
			</br>
			<div id=boutonErr onclick="self.location.href='identification.php'">
				ACCUEIL	
			</div>
		</div>		
<?php
}else
{
$menu1->closecursor();
/********************************************************
Si pas de commande Affichage de la page
*********************************************************/
?>
<div id=page>
	<div id=text>
	Voici le resume de votre commande
	</div>
	<div class=ligne1>
		<div class=col1> PAIN :</div>
		<div class=col2> <? echo $_POST['pain']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> TAILLE :</div>
		<div class=col2> <? echo $_POST['taille']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> VIANDE :</div>
		<div class=col2> <? echo $_POST['viande']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> FROMAGE :</div>
		<div class=col2> <? echo $_POST['temperature']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> TEMPERATURE :</div>
		<div class=col2> <? echo $_POST['sauce']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> LEGUMES :</div>
		<div class=col2> <?php echo $_POST['legume1']; ?> </div>
	</div>
	<? if ($_POST['legume2']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume2'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume3']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume3'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume4']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume4'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume5']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume5'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume6']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume6'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume7']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume7'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume8']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume8'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume9']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume9'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume10']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume10'];
			echo"</div>";
		echo "</div>";
	}
?>
</div>
<?php

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
