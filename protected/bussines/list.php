<?php
session_start();
require "../../database-config.php";
if (!isset($_SESSION["user"])) header("Location: ../login.php");
include "../navbar.php";

$res = mysqli_query($conn, "SELECT * FROM business_items ORDER BY created_at DESC");
?>

<div style="padding:50px;">
    <h2 style="margin-bottom:20px;">Business Products</h2>
    <a href="create.php"><button>Add New Product</button></a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>"><button>Edit</button></a>
                <a href="delete.php?id=<?php echo $row['id']; ?>"><button style="background:red;">Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
