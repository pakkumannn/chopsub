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
Si pas de commande
*********************************************************/
?>
<div id=page>
        <div id=formulaire>
        <form action="verifPerso.php" method="post">
	<div id=pain>		
		<div class=titre>
			<b>1 -  Choix du pain : </b>
		</div>		
		<div class=PainL1>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="blanc" id="blanc" />
				</div>
				<div class=TitreP1>
				Blanc
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="italien" id="italien" />	
				</div>
				<div class=TitreP1>
				Italien
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="P.Arigan" id="P.Origan" />
				</div>
				<div class=TitreP1>
				P.Origan
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Avoine Miel" id="avoine miel" /> 
				</div>
				<div class=TitreP1>
				Avoine/Miel	
				</div>
			</div>
		</div>

		<div class=PainL1>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Complet" id="Complet" />
				</div>
				<div class=TitreP1>
				Complet
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Wrap" id="Wrap" />
				</div>
				<div class=TitreP1>
				Wrap
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Flatbread" id="Flatbread" />
				</div>
				<div class=TitreP1>
				Flatbread
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Salade" id="Salade" />
				</div>
				<div class=TitreP1>
				Salade
				</div>
			</div>
		</div>
	</div>
	<div id=Taille>
		<div id=titreTaille>
			<b>2 -  Choix de la taille : </b>
		</div>		
		<div id=TailleL1>
				<select name="taille">
					<option value="30 cm">30 cm </option>
					<option value="15 cm">15 cm </option>
				</select>	
		</div>
	</div>
        <a href="identification.php"> <input type="button" value="Accueil"></a>
        <input type="submit" value="Valider">
	</form>
	</div>

<?php
}
?>
</div>

<?php
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
</html>
