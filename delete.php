<?php 
//apagar tarefa
include 'db.php';
session_start();
// Garante que o utilizador está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$user_id = $_SESSION['user_id'];
// Apagar tarefa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    // Apaga apenas a tarefa do usuário logado
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);
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
    <title>Apagar Tarefa</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="form-container">
        <form action="delete.php" method="post">
            <h2>Apagar Tarefa</h2>
            <input type="number" name="task_id" placeholder="ID da Tarefa" required>
            <input type="submit" value="Apagar">
        </form>
        <a href="home.php" class="login-circle">Voltar</a>
    </div>
</body>
</html>
