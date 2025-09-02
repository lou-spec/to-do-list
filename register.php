<?php
// import db connection
include 'db.php';

// start session
session_start();
// make a insert query for register
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['fname'];
    $password = $_POST['password'];

    // Verifica se o email já existe
    $stmt = $conn->prepare("SELECT id_users FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Este email já está cadastrado!";
    } else {
        // Insere novo usuário
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);
        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            echo "Erro: " . $stmt->error;
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="css/form.css">
    </head>
<body>
<div class="form-container">
<form action="#" method="post">
    <h2>Register</h2>
  <label for="email">Email:</label><br>
  <input type="email" name="fname" placeholder="example@gmail.com"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="12345"><br><br>
    <input type="submit" value="Submit">
    <a href="login.php" class="login-circle">Login</a>
</form>
</div>
</body>
</html>