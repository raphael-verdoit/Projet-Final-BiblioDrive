<?php if (isset($_SESSION['mel'])): ?>
    
    <p>Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong> (Connecté)</p>
    <a href="./php/logout.php">Se déconnecter</a>

<?php else: ?>
    <h2>Connexion</h2>
    <?php if(isset($erreur) && $erreur) echo "<p style='color:red'>$erreur</p>"; ?>
    
    <form action="" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="pass" name="pass" required>
        </div>
        <button type="submit" name="login_submit">Log In</button>
    </form>
<?php endif; ?>