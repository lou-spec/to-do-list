<?php
include 'db.php';
session_start();

// Garante que o utilizador está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Verifica se foi passado o ID da tarefa via GET
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];

    // Atualiza apenas a tarefa do usuário logado
    $stmt = $conn->prepare("UPDATE tasks SET status = 'done' WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $user_id);
    $stmt->execute();
}

// Redireciona de volta para o home
header("Location: home.php");
exit;
?>