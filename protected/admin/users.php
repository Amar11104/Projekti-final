<?php
include '../database-config.php';
include '../navbar.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: users.php");
}

$users = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
?>
<link rel="stylesheet" href="../style.css">
<div class="container card">
<h2>Users Management</h2>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Created At</th>
<th>Actions</th>
</tr>
<?php while($u = $users->fetch_assoc()): ?>
<tr>
<td><?= $u['name'] ?></td>
<td><?= $u['email'] ?></td>
<td><?= $u['role'] ?></td>
<td><?= $u['created_at'] ?></td>
<td>
<a href="users.php?delete=<?= $u['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>
<?php include '../footer.php'; ?>
