<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
session_start();
require "conndb.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["registrati"])) {

        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $cognome = isset($_POST["cognome"]) ? $_POST["cognome"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["pass"]) ? $_POST["pass"] : "";

        // Cripta la password
        $passMd5 = md5($password);

        // Prepara l'istruzione SQL per l'inserimento
        $stmt = $conn->prepare("INSERT INTO `sign-up`.`utenti` (nome, cognome, email, password, username) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $cognome, $email, $passMd5, $username);

        // Esegui l'istruzione SQL
        if ($stmt->execute()) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "Errore durante la registrazione.";
        }

        // Chiudi la connessione e lo statement
        $stmt->close();
        $conn->close();

    } else {
        echo "Errore nella richiesta.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="container">
        <h1>Registrati</h1>
        <form action="sign-up.php" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nomeID" required> 

            <label for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognomeID" required> 

            <label for="email">Email</label>
            <input type="email" name="email" id="emailID" required> 

            <label for="pass">Password</label>
            <input type="password" name="pass" id="passID" required> 

            <label for="username">Username</label>
            <input type="text" name="username" id="usernameID" required>

            <button type="submit" name="registrati">Registrati</button>
        </form>
    </div>
</body>
</html>