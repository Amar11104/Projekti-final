<?php
session_start();
require "../../database-config.php";
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
include "../navbar.php";

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM business_items WHERE id=$id");
$item = mysqli_fetch_assoc($res);

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $desc = mysqli_real_escape_string($conn, $_POST["description"]);
    $price = $_POST["price"];

    mysqli_query($conn, "UPDATE business_items SET name='$name', description='$desc', price='$price' WHERE id=$id");
    $msg = "Item updated successfully!";
}
?>

<div class="container" style="max-width:500px; margin-top:50px;">
    <h2><?php echo isset($item) ? "Edit Product" : "Add New Product"; ?></h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" value="<?php echo $item['name'] ?? ''; ?>" required><br>
        <textarea name="description" placeholder="Description"><?php echo $item['description'] ?? ''; ?></textarea><br>
        <input type="text" name="price" placeholder="Price" value="<?php echo $item['price'] ?? ''; ?>" required><br><br>
        <button type="submit"><?php echo isset($item) ? "Update" : "Add"; ?> Product</button>
    </form>
    <p class="success"><?php echo $msg ?? ''; ?></p>
    <a href="list.php">Back to List</a>
</div>

