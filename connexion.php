<!-- connexion bdd -->
        <?php
        function connexion()
                {
                        try
                        {
                                $bdd = new PDO('mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_8c727900bd20d2d', 'bdc4ca09f8e066', '0e2c8e68');
                                return $bdd;
                        }
                                catch (Exception $e)
                        {
                                die('Erreur : ' . $e->getMessage());
                        }
                }
        ?>
