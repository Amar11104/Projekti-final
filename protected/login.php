<?php 
include 'database-config.php';

if($_POST){
 $email=$_POST['email'];
 $pass=$_POST['password'];
 $res=$conn->query("SELECT * FROM users WHERE email='$email'");
 $u=$res->fetch_assoc();
 if($u && password_verify($pass,$u['password'])){
  $_SESSION['user']=$u;
  header("Location: home.php");
 }
}

?>
<link rel="stylesheet" href="style.css">
<div class="container card">
<h2>Login</h2>
<form method="POST">
<input name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button>Login</button>
</form>
<p>Don't have an account? <a href="signup.php">Sign Up</a></p>
</div>
