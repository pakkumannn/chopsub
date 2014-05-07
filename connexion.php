<!-- connexion bdd -->
	<?php
	function connexion()
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=chopine', 'chopine', 'chopine');
				return $bdd;
			}
				catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
	?>