<?php 
include 'database-config.php'; 
include 'navbar.php'; 
?>
<link rel="stylesheet" href="style.css">
<div class="container">
  <h1>Welcome <?= $_SESSION['user']['name'] ?> 🍽️</h1>
  <p>Reserve your luxury table today</p>
  <a href="bussines/create.php"><button>Book a Table</button></a>

  <div class="card" style="margin-top:30px;">
    <h2>Why Choose Luxe?</h2>
    <ul>
      <li>Exquisite dishes made from fresh ingredients</li>
      <li>Elegant ambiance for any occasion</li>
      <li>Professional and friendly staff</li>
      <li>World-class wine selection</li>
    </ul>
  </div>

  <div class="gallery" style="margin-top:30px;">
    <img src="ownload.jpg" alt="Dish">
    <img src="ownload.jpg" alt="Interior">
    <img src="ownload.jpg" alt="Dining">
  </div>
</div>
<?php include 'footer.php'; ?>
