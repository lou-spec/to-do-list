<?php
include 'db.php';
session_start();

// Garante que o utilizador está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Inserir nova tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task'])) {
    $task = $_POST['task'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO tasks (user_id, title) VALUES ('$user_id', '$task')";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="form-container">
        <form action="addtask.php" method="post">
            <h2>Adicionar Nova Tarefa</h2>
            <input type="text" name="task" placeholder="Digite a tarefa" required>
            <input type="submit" value="Adicionar">
        </form>
        <a href="home.php" class="login-circle">Voltar</a>
    </div>
</body>
</html>

