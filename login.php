<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="authentification.php" method="post">
        <label for="id">Numéro d'adhérent:</label>
        <input type="number" id="id" name="id" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
