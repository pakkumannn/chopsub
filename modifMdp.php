<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="./css/StyleModifCpt.css" rel="stylesheet" media="all" type="text/css">
<link href="./css/baniere.css" rel="stylesheet" media="all" type="text/css">
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
	$_SESSION['modifLog']=$_POST['sup'];
}
$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();
if ($donnees1['nb1']==1) {
	?>
<div id=header>

        <div id=typecom>
        <?php
                $connection->closeCursor();
                $connection3 = $bdd->query("SELECT * FROM choix;");
                $donnee3 = $connection3->fetch();
                echo "Commande :";
                echo "</br>";
                echo "<div id=resultat>";
                echo $donnee3['choix'];
                echo "</div>";
                echo "</br>";
                echo "Selectionné le ";
                echo "</br>";
                echo "<div id=resultat>";
                echo $donnee3['jour'];
                echo "</div>";
        ?>
        </div>


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
			<div id=boutonDH onclick="self.location.href='deconnexion.php'">
				déconnexion	
			</div>
	</div>
</div>
<div id=page>

	<div id=titre> Mise à jour du mot de passe </div>
<?php
//Récupération du role en base
$connection2=$bdd->query("select admin, mdp  from identi where login='".$_SESSION['compte']."'");
$donnees2 = $connection2->fetch();

// attribution du libellé 
if ($_POST['role']=='0'){
	$role="utilisateur";
}
if ($_POST['role']==1){
	$role="admin";
};
if ($_POST['role']==2){
	$role="subway";
};
if ($_POST['role']==3){
	$role="burger";
};
if ($_POST['role']==4){
	$role="pizza";
};
 
	// si MDP1=MDP2 et LOGIN not null et MDP1 not null et ROLE diff de ROLEDB  	

	if ($_POST['nmdp']==$_POST['nmdp2'] and $_SESSION['compte']!='' and $_POST['nmdp']!= '' and $_POST['role']!=$donnees2['admin']){

		$nmdp=md5($_POST['nmdp']);		
		$bdd->exec("update identi set mdp='".$nmdp."', admin='".$_POST['role']."'  where login='".$_SESSION['compte']."';");
		echo "Le mot de passe et le rôle ".$role." ont été mis à jour pour ".$_SESSION['compte'];
	?>
	
		<div id=footer2>
			<a href='listeCpt.php'>RETOUR</a>
		</div> 
	<?php
	}else{
		// Si MDP1=MDP2 et LOGIN not null et MDP1 not null et ROLE=ROLEDB
		if ($_POST['nmdp']==$_POST['nmdp2'] and $_SESSION['compte']!='' and $_POST['nmdp']!= '' and $_POST['role']==$donnees2['admin']){
	
			$nmdp=md5($_POST['nmdp']);		
			$bdd->exec("update identi set mdp='".$nmdp."', admin='".$_POST['role']."'  where login='".$_SESSION['compte']."';");
			echo "Le mot de passe a été mis à jour pour ".$_SESSION['compte'];
		?>
	
			<div id=footer2>
				<a href='listeCpt.php'>RETOUR</a>
			</div> 
	<?php

		}else{
			// Si MDP1 est vide et MDP2 est vide et LOGIN not null et ROLE diff de ROLEDB
			if ($_POST['nmdp']=='' and $_POST['nmdp2']=='' and $_SESSION['compte']!='' and $_POST['role']!=$donnees2['admin']){

				$bdd->exec("update identi set admin='".$_POST['role']."'  where login='".$_SESSION['compte']."';");
				echo "Le rôle ".$role." a été mis à jour pour ".$_SESSION['compte'];

			?>
	
				<div id=footer2>
					<a href='listeCpt.php'>RETOUR</a>
				</div> 
			<?php


			}else{
				// Si MDP1 est vide et MDP2 est vide ROLE=ROLEDB
				if ($_POST['nmdp']=='' and $_POST['nmdp2']=='' and $_SESSION['compte']!='' and $_POST['role']==$donnees2['admin'] or $_POST['nmdp']!=$_POST['nmdp2'] and $_SESSION['compte']!='' and $_POST['role']==$donnees2['admin'] or  $_POST['nmdp']!=$_POST['nmdp2'] and $_SESSION['compte']!='' and $_POST['role']!=$donnees2['admin']){
i
	?>
						Il y a une erreur dans les informations saisies
						<div id=footer2>
							<a href='listeCpt.php'>RETOUR</a>
						</div> 
	<?php

				}	
			}	
		}
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


