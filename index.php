<?php
require_once "config.php";
include "header.php";
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error)
  die("Connection to database failed:" .
    $conn->connect_error);
$conn->query("set names utf8"); // Support umlaut characters
?>
<h1>Honest Tuomas's webshop</h1>
<p>You should definitely call me about these.</p>
<ul>
<?php
$results = $conn->query(
"SELECT id,name,price FROM nieminen_products;");
while ($row = $results->fetch_assoc()) {
 ?>
 <li>
   <a href="description.php?id=<?=$row['id']?>">
      <?=$row['name']?></a>
      <?=$row['price']?>EUR
 </li>
 <?php
}
$conn->close();
?>
</ul>
<? include "footer.php" ?>


