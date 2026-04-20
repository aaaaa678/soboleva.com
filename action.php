<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    echo "<h1>Данные получены</h1>";
    echo "<p>Имя: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<a href='index.php'>Назад</a>";
} else {
    header("Location: index.php");
}
?>
