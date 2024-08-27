<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<h1 class='welcome-message'>Ciao " . htmlspecialchars($username) . "</h1>";
            ?>
            <p class="welcome-message">
                <a href="animazione.html">Animazione</a>
            </p>
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
            <?php
        } else {
            ?>
            <h1>Accedi</h1>
            <form action="login.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" required>
                <button type="submit">Accedi</button>
            </form>
            <p>Non hai un account? <a href="sign-up.php">Registrati</a></p>
            <?php
        }
        ?>
    </div>
</body>
</html>
