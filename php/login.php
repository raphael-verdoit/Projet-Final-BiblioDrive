<html>
    <body>
        <?php require_once 'db.php';?>

        <?php
            $email = $_POST['email']; #POST pour securiser
            $password = $_POST['password'];

            $sql = 'SELECT 
                        mel, 
                        motdepasse 
                    FROM 
                        utilisateur
                        
            ';
            $stmt = $connexion->prepare($sql);
            
            try {
                $stmt->execute([':email' => $email, ':password' => $password]);
            } catch (Exception $e) {
                echo "Erreur lors de l'insertion : " . $e->getMessage();
                die(); 
            }
        ?>
    </body>
</html>