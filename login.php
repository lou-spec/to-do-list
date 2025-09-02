<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // prepared statement para segurança
    $stmt = $conn->prepare("SELECT id_users FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['user_id'] = $row['id_users']; // salva apenas o ID
        header("Location: home.php");
        exit;
    } else {
        echo "Login inválido";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/form.css">
    </head>
<body>
<div class="form-container">

<form action="login.php" method="post">
    <h2>Login</h2>
  <label for="email">Email:</label><br>
  <input type="email" name="email" placeholder="example@gmail.com"><br>
  <label for="password">Password:</label><br>
  <input type="password" name="password" placeholder="123456"><br><br>
  <input type="submit" value="Submit">
</form> 
<!-- Círculo dentro do container -->
<a href="register.php" class="login-circle">Register</a>
</div>

</body>
</html>

