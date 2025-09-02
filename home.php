<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container">
        <a href="addtask.php" class="btn btn-add">+ Nova Tarefa</a>
        <a href="update.php" class="btn btn-add">+ Atualizar Tarefa</a>
        <a href="delete.php" class="btn btn-add">+ Apagar Tarefa</a>
        <a href="logout.php" class="btn btn-logout">Logout</a>
        <h2>Minhas Tarefas</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <?php if ($row['status'] == 'pending') { ?>
                            <a href="done.php?id=<?= $row['id'] ?>" class="btn btn-done">Concluir</a>
                        <?php } else { ?>
                            ✔
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>