<?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];
 $user = $_SESSION['mobile'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Stock dashboard</title>
      <?php include_once('include/css.php'); ?>
      <style type="text/css">
         .Product tr td{
            color: black;font-weight: 500;
         }
         .table.projects thead.thead-dark th{
                background: #b9340b;
         }

.dots-menu{
  font-size: 15px;
}
  &.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-radius: 5px;
  }
  
  a.btn{
    /* @extend .glyphicon !optional;
    &:before{
      content: "\e235";
    } */
    }
    &:active{
    -webkit-box-shadow: none;
    box-shadow: none;
    }
  }

  ul
    &.dropdown-menu {
      right: auto;
      left: 15px;
      min-width: 50px;

}
      li{
        padding: 0;
        width: 100%;
     }
        a{
          margin: 0;
        }
      }
    }
  }
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
                              <h2>Product Request</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2 style="color:red; font-weight:600">Product Return Request <small>>List</small></h2>
                                 </div>
                                
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">S.No.</th>
                                                   <th style="width: 30%">Staff Name</th>
                                                  <th>Product Name</th>
                                                 <th>Reasion</th>
                                                 <th>Remark</th>
                                                 <th>Request Date</th>
                                                  <th>Request Quantity</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody class="Product">
                                                <?php
                                       $sql1 = "SELECT * FROM   vgi_product_distribution WHERE return_request = 'Pending'";
                                       $result1 = mysqli_query($conn, $sql1);
                                       while($data1=mysqli_fetch_array($result1))
                                        { 
                                          $id_dis = $data1['id'];
                                           $product_id = $data1['product_name'];
                                        
                                           $sql = "SELECT * FROM  vgi_return_request WHERE status ='Pending' AND product_name =$product_id";
                                           $result = mysqli_query($conn, $sql);
                                           $i=1;
                                           while($data=mysqli_fetch_array($result))
                                           { 
                                             $id_return = $data['id'];
                                             $user = $data['user'];
                                              $product_name = $data['product_name'];
                                              $request_date = $data['request_date'];
                                              $return = $data['return_quantity'];
                                              $reasion = $data['reasion'];
                                              $remarks = $data['remarks'];
                                              $status = $data['status'];

                                              $sqlu = "SELECT * FROM  tbl_admin WHERE mobile = '$user'";
                                               $resultu = mysqli_query($conn, $sqlu);
                                                  $datau=mysqli_fetch_array($resultu);
                                                 $staff = $datau['username'];

                                              $sql2 = "SELECT * FROM vgi_product WHERE id=$product_name";
                                                 $result2 = mysqli_query($conn, $sql2);
                                                 $data2 = mysqli_fetch_array($result2);
                                                 $pname = $data2['product_name'];
                                                
                                              ?>
                                                <tr>
                                                <td><?php echo $i ;?></td>
                                                <td><?php echo $staff ;?></td>
                                                 <td><?php echo $pname ;?></td>
                                                 <td><?php echo $reasion ;?></td>
                                                 <td><?php echo $remarks ;?></td>
                                                 <td> <?php echo $request_date ;?></td>
                                                 <td> <?php echo $return ;?></td>
                                                 <td > <?php echo $status ;?></td>
                                                   <td>
                                                     

                                                      <div class="dots-menu btn-group">
                                                        <a data-toggle="dropdown" class="btn btn-outline-warning"><i class="fa fa-ellipsis-v" aria-hidden="true" style="font-size:25px"></i></a>
                                                         <ul style="padding:25px; box-shadow: inset 0 0 10px #595752;" class="dropdown-menu">
                                                          <li style="padding:2px"><a href="aprove_return.php?id_dis=<?php echo $id_dis;?>&id_return=<?php echo $id_return;?>" > <button style="cursor: pointer;" type="button" class="badge badge-success"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Return</button></a></li>

                                                          <li style="padding:2px" class="delete-row"><a href="damage.php?id_dis=<?php echo $id_dis;?>&id_return=<?php echo $id_return;?>"> <button type="button" style="cursor: pointer;" class="badge badge-danger"><i class="fa fa-trash-o"></i> &nbsp;&nbsp;Damage</button></a>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                    </td>
                                                </tr>
                                             <?php $i++; } }?>
                                             </tbody>
                                          </table>
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
 
 
   </body>
</html>