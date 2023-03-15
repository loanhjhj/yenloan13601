<?php

include 'partials/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
include 'partials/add_cart.php';
include 'partials/header.php';

?>

<section class="product_section layout_padding">
    <div class="container">  
        <div class="row">
            <?php
            if(isset($_REQUEST['search_box'])) {
                $search_box = addslashes($_POST['search_box']);
                if (empty($search_box)) {
                  echo '<p class="empty" style="text-align:center">Bạn chưa nhập dữ liệu tim kiếm</p>';
              } 
              else
              {
                $query = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'");
                $query->execute();
                if($query->rowCount() > 0){
                while($fetch_product = $query->fetch(PDO::FETCH_ASSOC)){
            ?>
           <div class="col-sm-6 col-md-4 col-lg-4"> 
               <div class="box">
                     <div class="option_container">
                           <form action="" method="post" class="box">
                              <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                              <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                              <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                              <input type="hidden" name="detail" value="<?= $fetch_product['detail']; ?>">
                              <input type="hidden" name="image" value="<?= $fetch_product['image']; ?>">  
                              <div class="options">
                                 <input type="number" name="qty" class="qty" min="1" max="99" 
                                        onkeypress="if(this.value.length == 2) return false;" value="">
                                 <input type="submit" value="add to cart" class="btn" name="add_to_cart">&nbsp;
                                 <input type="submit" value="detail item" class="btn" name="detail_item">
                              </div>
                           </form>
                        </div>
                        <div class="img-box">
                           <img src="uploaded_img/<?= $fetch_product['image']; ?>" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                              <div class="name"><?= $fetch_product['name']; ?></div>
                           </h5>
                           <h6>
                              <div class="price"><?= $fetch_product['price']; ?><span>$</span></div>
                           </h6>
                     </div>
                  </div>
               </div>
            <?php
                    }
                }else{
                    echo '<p class="empty" style="text-align:center">Không tìm thấy sản phẩm</p>';
                }
               }
            }
            ?>

        </div>
    </div>
</section>

<script src="js/script.js"></script>

</body>
</html>