  <?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
  "hello ".$_SESSION['mobile'];

$user_mobile = $_REQUEST['user_mobile'];
$id_dis = $_REQUEST['id_dis'];
$id_return = $_REQUEST['id_return'];

$sqlu = "SELECT * FROM   vgi_product_distribution  WHERE id='$id_dis' AND return_request='Pending'";
$resultu = mysqli_query($conn, $sqlu);
 $datau=mysqli_fetch_array($resultu);

$dis_pro_id = $datau['product_name'];
$dq = $datau['quantity'];
$rq = $datau['return_quantity'];
$quant = ($dq - $rq);


$sqls = "SELECT * FROM   vgi_stock  WHERE product_id='$dis_pro_id'";
$results = mysqli_query($conn, $sqls);
 $datas=mysqli_fetch_array($results);
$stock_q = $datas['stock_quantity'];
$plus_q = ($stock_q + $rq);
 
 $sql1 = "UPDATE vgi_return_request SET status='Approve' WHERE id='$id_return'";
$result1 = mysqli_query($conn, $sql1);

 $sql2 = "UPDATE vgi_product_distribution SET return_request='Approve',quantity=$quant WHERE id='$id_dis'";
$result2 = mysqli_query($conn, $sql2);


 $sql3 = "UPDATE  vgi_stock SET  stock_quantity=$plus_q WHERE product_id='$dis_pro_id'";
$result3 = mysqli_query($conn, $sql3);

if ($result1 && $result2 && $result3) {
      header('Location:return_request.php');
} else {
     echo "Error updating database.";
}

?>  