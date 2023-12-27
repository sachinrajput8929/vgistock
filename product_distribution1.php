<?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];

 $newidd=$_REQUEST['newidd'];
 $umobile=$_REQUEST['umobile'];
 $uname=$_REQUEST['uname'];
 date_default_timezone_set("Asia/Calcutta");
    $tdate = date('Y-m-d');
 $created_date = date("d-m-Y", strtotime($tdate));

 

if (isset($_POST['submit'])){
 
$product_name=$_POST['product_name'];
$product_code=$_POST['product_code'];
$remark=$_POST['remark'];
$quantity=$_POST['quantity'];
$status= '1';
 $product_code = $product_name . '-VGI-' . $product_code;
$sql = "INSERT INTO vgi_product_distribution (staff_name, product_name,product_code, remark, quantity, return_request, status, given_date) VALUES ('$umobile', '$product_name','$product_code', '$remark', '$quantity', '0', '$status', '$tdate')";

   $result=mysqli_query($conn,$sql);
   if($result){
      echo "<script language='javascript'> alert ('Given Product successfully!');</script>";
    }
 }




if (isset($_POST['submit']))
{
 $newidd=$_REQUEST['newidd'];
 $sqlu="update vgi_new_request set status='Approve'  where id ='".$newidd."'";
    $resultu=mysqli_query($conn,$sqlu);
    if($resultu)
    {    
    }
    else
    {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    
    $sql0 = "SELECT * FROM vgi_stock WHERE product_id = '$product_name'";
    $result0 = mysqli_query($conn, $sql0);
    
    while ($data0 = mysqli_fetch_array($result0)) {
        $stock_id = $data0['product_id'];
        $st_quantity = $data0['stock_quantity'];
    }
    
    $n_quant = ($st_quantity - $quantity);
    
    $sqlu = "UPDATE vgi_stock SET stock_quantity = '$n_quant' WHERE product_id = '$product_name'";
    
    $resultu = mysqli_query($conn, $sqlu);
    
    if (!$resultu) {
        echo "Error: " . $sqlu . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Product Distribution</title>
      <?php include_once('include/css.php'); ?>
      <style type="text/css">
         .Product tr td{
            color: black;font-weight: 500;
         }
      </style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <?php include_once('include/header.php'); ?>
             <?php include_once('include/sidebar.php'); ?>
            <div id="content">
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>  Distribution</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Product <small>> Distribution To Staff</small></h2>
                                 </div>
                                  <div class="button_block" style="float:right;">
                                    <a href="distibution_list.php"><button type="button" class="btn cur-p btn-danger">Distribution List</button></a>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <form method="post">

        <div class="row">
              <div class="col-md-4">
               <div class="form-group">
                  <label>Staff Name<sup>*</sup></label>
                  <input type="text" name="staff_name" value="<?php echo $uname;?>"  style="background: #c2c2c2;"  class="form-control" readonly>

               </div>
            </div>
             <div class="col-md-4">
               <div class="form-group">
                  <label id="email-label" for="email">Product Code Number</label>
                  <input type="text" name="product_code"   class="form-control" >
               </div>
            </div>
             <div class="col-md-4">
               <div class="form-group">
                  <label>Product Name<sup>*</sup></label>
                  <select id="product" name="product_name" class="form-control" style="height: 50px;" required>
                   <option disabled selected value>Select</option>
                    <?php
                    $newidd1=$_REQUEST['newidd'];
                     $sql1 = "SELECT * FROM vgi_new_request WHERE id=$newidd1";
                     $result1 = mysqli_query($conn, $sql1);
                     while ($data1 = mysqli_fetch_array($result1)) {
                     $pid = $data1['product_name'];

                     $sql2 = "SELECT * FROM vgi_product WHERE id=$pid";
                     $result2 = mysqli_query($conn, $sql2);
                     $data2 = mysqli_fetch_array($result2);
                     $product_name = $data2['product_name'];
                     ?>
                     <option value="<?php echo $pid;?>"><?php echo $product_name;?></option>
                  <?php } ?>
                  </select>
                <p id="result" style="color: #12ab12;font-weight: 700;"></p>

               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label id="name-label" for="name">Quantity<sup>*</sup></label>
                <input type="number" name="quantity" id="quant"  class="form-control" required>
                <div id="error-message" style="color: red;font-weight: 800;"></div>
               </div>
            </div>
             <div class="form-group">
                   <input type="hidden" name="return_request">
               </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label id="email-label" for="email">Product Distribution Date</label>
                  <input type="text" name="given_date" value="<?php echo $created_date;?>"  style="background: #c2c2c2;"  class="form-control" readonly>
               </div>
            </div>
         </div>
          

         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label id="email-label" for="email">Remarks<sup>*</sup></label>
                  <textarea  id="comments" class="form-control" name="remark" placeholder="Remark..."></textarea>
               </div>
             </div>
         </div>
         
         <div class="row">
            <div class="col-md-4">
               <button type="submit" id="submit" name="submit" class="btn btn-dark">Submit</button>
            </div>
         </div>

      </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
      </div>
 <div style="margin-top:60px">
<?php include_once('include/bottom.php'); ?>
 </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

 <script type="text/javascript">
 // Quantity validation on input change
$("#quant").on("input", function() {
    var inputQuantity = parseInt($(this).val());
    var responseQuantity = parseInt($('#quant').data('original-quantity'));

    if (inputQuantity > responseQuantity) {
        $('#error-message').html('Invalid Quantity Because Product Out of Stock ');
    }else if(inputQuantity < 0) {
        $('#error-message').html('Invalid Quantity Because Below Zero');
    }else {
        $('#error-message').html('');
    }
});

$("#product").change(function() {
    var pid = $(this).val();
    $.ajax({
        url: 'data.php',
        method: 'POST',
        data: {'pid': pid},
        success: function(response) {
            // Set the value of the input field
            // $('#quant').val(response);
            $('#result').html('This Product stock avilable: ' + response);

            // Store the original response quantity in a data attribute
            $('#quant').data('original-quantity', response);
        }
    });
});

  
</script>

  
   </body>
</html>