<?php
include 'partials/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
$err = [];
if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];
   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $check = $select_user->fetch(PDO::FETCH_ASSOC);

   if($email == isset($check['email'])){
      $err= "Email exist";
   }
   if(empty($name)){
      $err = 'No name entered';
   }
   if(empty($email)){
      $err = 'No email entered';
   }
   if(empty($password)){
      $err = 'No password entered';
   }
   if($pass != $cpass){
      $err = 'Password incorrect';
   }else{
      $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
      $insert_user->execute([$name, $email, $cpass]);
      header('Location: login.php');
   }
   echo "<br><b>$err</b><br><br>";  
}

?>

<!DOCTYPE html>
<html>

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
                     <h3>REGISTER</h3>
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
                        <fieldset>
                           <label class="form-label"  required><b>Your Username </b></label>
                           <input type="text" name="name" placeholder="Enter your username..." required>
                           <label class="form-label"  required><b>Email address: </b></label>
                           <input type="email" placeholder="Enter your email..." name="email" required />
                           <label class="form-label"  required><b>Password </b></label>
                           <input type="password" placeholder="Enter your password..." name="pass" required />
                           <label class="form-label"  required><b>Password </b></label>
                           <input type="password" name="cpass" placeholder="Confirm your password..." required oninput="this.value = this.value.replace(/\s/g, '')">
                           <input type="submit" value="Register" class="btn" name="submit">
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
       <br>
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