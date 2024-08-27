<?php
session_start();
require 'conndb.php'; // Assicurati che il nome del file sia corretto

if (isset($_POST["username"]) && isset($_POST["pass"])) {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $userMd5Pass = md5($password);

    // Prepara l'istruzione SQL
    $stmt2 = $conn->prepare("SELECT username, password FROM utenti WHERE username = ? AND password = ?");
    if ($stmt2 === false) {
        die('Errore nella preparazione della query: ' . htmlspecialchars($conn->error));
    }

    // Bind dei parametri
    $stmt2->bind_param("ss", $username, $userMd5Pass);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) { 
        if ($row = $result2->fetch_assoc()) {
            $_SESSION["username"] = $row["username"];
            header("Location: index.php");
            die();
        }
    } else {
        echo "<br> Credenziali non valide <br>";
        echo "<a href='index.php'> Torna indietro </a>";
    }
} else {
    echo "<br> Credenziali non valide <br>";
    echo "<a href='index.php'> Torna indietro </a>";
}
?>
