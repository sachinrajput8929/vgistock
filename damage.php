  <?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
  "hello ".$_SESSION['mobile'];

$user_mobile = $_REQUEST['user_mobile'];
$id_dis = $_REQUEST['id_dis'];
$id_return = $_REQUEST['id_return'];
 
 $sql1 = "UPDATE vgi_return_request SET status='Damage' WHERE id='$id_return'";
$result1 = mysqli_query($conn, $sql1);

 $sql2 = "UPDATE vgi_product_distribution SET return_request='Damage' WHERE id='$id_dis'";
$result2 = mysqli_query($conn, $sql2);

if ($result1 && $result2) {
      header('Location:return_request.php');
} else {
     echo "Error updating database.";
}

?>  