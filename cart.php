<?php
session_start();

include 'partials/connect.php';

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
};


if(isset($_POST['delete'])){
   $id = $_POST['id'];
   $sql = "DELETE FROM `cart` WHERE id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);
   header('location: cart.php');
}

if(isset($_GET['delete_all'])){
   $sql = "DELETE FROM `cart` WHERE user_id = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$user_id]);
   header('location: cart.php');
}

if(isset($_POST['update_qty'])){
   $id = $_POST['id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $id]);
   $message[] = 'Sản phẩm đã được cập nhật trong giỏ hàng';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Giỏ hàng</title>
   <link rel="shortcut icon" href="images/logo.png" type="">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/thu1.css">

</head>
<body>
   
<?php include 'partials/header.php'; ?>

<section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>CART</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>

   <?php
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
   ?>
   <section class="product_section layout_padding">
      <div class="container">  
         <div class="row">
               <div class="box">
                  <form action="" method="post">            
                     <div class="row ">
                        <div class="col">
                        <input type="hidden" name="id" value="<?= $fetch_cart['id']; ?>">
                        <div class="img-box">
                            <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
                        </div>
                     </div>
                        <div class="col-sm">
                           <div class="detail-box">
                              <div class="name"><?= $fetch_cart['name']; ?></div>
                              <div class="price">$<?= $fetch_cart['price']; ?></div>
                           </div>
                              <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>">
                              <button type="submit" class="fas fa-edit" name="update_qty"></button>
                              <div class="sub-total"> sub total : <span>$<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></span> </div>
                              <input type="submit" value="delete item" onclick="return confirm('Bạn muốn xóa sản phẩm?');" class="delete-btn" name="delete">
                           </div>
                        </div>
                     </div>
                  </form>
            </div>
         </div>


         <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<p><center>CART EMPTY</center></p>';
         }
      ?>
      <hr>
      <div class="container" style="text-align: right">
         <b><p>grand total : <span>$<?= $grand_total; ?></span></p>
         <a href="#" class="option-btn">Đặt hàng</a>&nbsp;&nbsp;
         <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('Bạn muốn xóa tất cả sản phẩm?');">delete all item</a></b>
      </div> 
</div>
</section>

<?php include 'partials/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>