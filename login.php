<?php
   include 'partials/connect.php';
   session_start();

   if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
      exit;
   }else{
      $user_id = '';
   };

   if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$select_user = $conn->prepare("SELECT * FROM users ,admin WHERE users.email='".$email."' AND users.password='".$password."'  LIMIT 1");
      $select_user->execute();
      $record = $select_user->fetch();
		if($select_user->rowCount() > 0){
         $userid = $record['id'];
         $_SESSION['user_id'] = $userid; 
			header("Location:index.php");
		}elseif($email=='admin@gmail.com'){
            $_SESSION['user_id']= $row['id'];
            header("Location:admin/login.php");
        }else{
			echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
        }
	} 

   ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" href="images/logo.png" type="">
      <title>MT SHOP</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <link href="css/style.css" rel="stylesheet" />
      <link href="css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <?php include 'partials/header.php' ?>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>LOGIN</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->

      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form action="" method="post">
                           <label class="form-label"  required><b>Email address: </b></label>
                           <input type="email" placeholder="Nhập vào email..." name="email" required />
                           <label class="form-label"  required><b>Password </b></label>
                           <input type="password" placeholder="Nhập vào mật khẩu..." name="password" required />
                           <input type="submit" value="Submit" class="btn" name="submit">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div style="text-align: center; margin-top: -40px;">
         Don't have an account? <a href="register.php" style="color: blue;"> REGISTER</a><br>
      </div>
      <br><br><br>
      <!-- end why section -->
      <!-- footer section -->
      <?php include 'partials/footer.php' ?>
      <!-- footer section -->
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>