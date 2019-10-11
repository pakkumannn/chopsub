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

<?php 
	$_SESSION['compte']=$_POST['sup']; 
	$connection2=$bdd->query("select admin from identi where login='".$_POST['sup']."'");
	$donnees2 = $connection2->fetch();
?>
	<div id=titre> Modification compte </div>
<!-- Vérificaiton de la varible $_POST['sup']-->
        <?php if (!empty($_POST['sup'])) { ?>
		<form action="modifMdp.php" method="post">
                	<div id=login>
                        	<div id=text>login  :</div>
				<div id=saisie> <?php echo $_POST['sup'] ?> </div>
				<div id=text>Rôle  :</div>
				<div id=saisie> 
					<?php 
						if ($donnees2[admin]=='0') {
							echo "utilisateur";
						}
						
						if ($donnees2[admin]=='1') {
							echo "Admin";
						}

						if ($donnees2[admin]=='2') {
							echo "subway";
						}

						if ($donnees2[admin]=='3') {
							echo "burger";
						}
						
						if ($donnees2[admin]=='4') {
							echo "pizza";
						}
						 
					?> 
				</div>
        	        </div>
                	<div id=mdp>
                        	<div id=text1> nouveau mot de passe : </div>
                        	<div id=saisie1> <input type="password" name="nmdp" /> </div>
				 <div id=text1> confirmation mot de passe : </div>
				<div id=saisie1> <input type="password" name="nmdp2" /> </div>
			</div>
			<div id=mdp>
        	                <div id=text1> role : </div>
                	        <div id=saisie1> 
					<select name="role" > 

					<?php 
						if ($donnees2[admin]=='0') {	
							echo "<option value='0'>utilisasteur</option>";
							echo "<option value='1'>admin</option>";
							echo "<option value='2'>subway</option>";
							echo "<option value='3'>burger</option>";
							echo "<option value='4'>pizza</option>";
						
						}
						
						if ($donnees2[admin]=='1') {
							echo "<option value='1'>admin</option>";
							echo "<option value='0'>utilisasteur</option>";
							echo "<option value='2'>subway</option>";
							echo "<option value='3'>burger</option>";
							echo "<option value='4'>pizza</option>";
						}

						if ($donnees2[admin]=='2') {
							echo "<option value='2'>subway</option>";
							echo "<option value='0'>utilisasteur</option>";
							echo "<option value='1'>admin</option>";
							echo "<option value='3'>burger</option>";
							echo "<option value='4'>pizza</option>";
						}

						if ($donnees2[admin]=='3') {
							echo "<option value='3'>burger</option>";
							echo "<option value='0'>utilisasteur</option>";
							echo "<option value='1'>admin</option>";
							echo "<option value='2'>subway</option>";
							echo "<option value='4'>pizza</option>";
						}
						
						if ($donnees2[admin]=='4') {
							echo "<option value='4'>pizza</option>";
							echo "<option value='0'>utilisasteur</option>";
							echo "<option value='1'>admin</option>";
							echo "<option value='2'>subway</option>";
							echo "<option value='3'>burger</option>";
						}
						 
					?> 

					</select>
				</div>
        	        </div>

        		<div id=footer>
	                        <a href="javascript:history.back()">RETOUR</a>
				<input type="submit" value="MODIFIER" id="boutonV">
				
				<div id=bouton1 onclick="self.location.href='validSupUser.php'">
                                	SUPPRESSION
	                        </div>
			</div>
		</form>
        <?php } else{ ?>
        Vous n'avez pas selectionné de compte
        <div id=footer2>
                <a href="javascript:history.back()">RETOUR</a>
         </div>
	<?php } ?>

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


