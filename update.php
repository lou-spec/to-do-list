<?php
// atualizar nome da tarefa
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
// Atualizar tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id']) && isset($_POST['new_title'])) {
    $task_id = $_POST['task_id'];
    $new_title = $_POST['new_title'];
    // Atualiza apenas a tarefa do usuário logado
    $stmt = $conn->prepare("UPDATE tasks SET title = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("sii", $new_title, $task_id, $user_id);
    $stmt->execute();

    // Redireciona de volta para o home
    header("Location: home.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Tarefa</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="form-container">
        <form action="update.php" method="post">
            <h2>Atualizar Tarefa</h2>
            <input type="number" name="task_id" placeholder="ID da Tarefa" required>
            <input type="text" name="new_title" placeholder="Novo Título" required>
            <input type="submit" value="Atualizar">
        </form>
        <a href="home.php" class="login-circle">Voltar</a>
    </div>
</body>
</html>
