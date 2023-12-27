<?php
require_once('include/config.php');
 
if (isset($_POST['pid'])) {
  $pid = $_POST["pid"];
  $result = mysqli_query($conn, "SELECT stock_quantity FROM vgi_stock WHERE product_id = '$pid'");
  
  while ($row = mysqli_fetch_array($result)) {
    echo $row["stock_quantity"];
  }
}
?>
