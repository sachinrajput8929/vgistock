<?php
include ("include/config.php");
if (isset($_POST['submit'])) {
    if (empty($_POST["mobile"])) {
        echo "<script language='javascript'> alert ('Please enter your Username!');</script>";
    } else if (empty($_POST["password"])) {
        echo "<script language='javascript'> alert ('Please enter your Password!');</script>";
    } else {
        $mobile = $_POST["mobile"];
        $password = $_POST["password"];

        // Displaying the entered values (this line seems to be for debugging purposes)
          "Name : " . $mobile . " Password :" . $password;

        if ($mobile == '9911673333' || $mobile == '7004529367') {
            $sql = "SELECT * FROM tbl_admin WHERE mobile='$mobile' AND password='$password'";
            $result = $conn->query($sql);

            if ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['username'];
                $_SESSION['mobile'] = $row['mobile'];
                $_SESSION['email'] = $row['email'];
                echo "<script language='javascript'> alert ('Login successfully!');</script>";
                header("location:dashboard.php");
            } else {
                echo "<script language='javascript'> alert ('Invalid Username or Password!');</script>";
                echo "<p style='color:#ff3d69;font-weight: 700;'>Invalid Username or Password Please try again.</p><br/>";
            }
        } else {
            echo "<p style='color:#ff3d69;font-weight: 700;'>Invalid Username or Password Please try again.</p><br/>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
     <title>VGI Stock Login</title>
      <?php include_once('include/css.php'); ?>
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="310" src="images/logo/log.png" alt="#" /> 
                     </div>

                  </div>
                  <div class="login_form">
                     <h3 class="py-4" style=" color: black;text-align: center !important;">VGI Stock</h3>

                     <form method="post">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Mobile/Email</label>
                              <input type="text" name="mobile" placeholder="E-mail" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           
                           <div class="field margin_0" style="text-align:center;">
                               <button type="submit" name="submit" class="main_bt">Sing In</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </body>
</html>