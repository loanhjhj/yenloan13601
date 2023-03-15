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

   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- product section --> 
               <section class="product_section layout_padding">
                  <div class="container">  
                     <div class="row">  
                     <?php
                        $select_products = $conn->prepare("SELECT * FROM `products` "); 
                        $select_products->execute();
                        if($select_products->rowCount() > 0){
                           while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
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
                                       <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
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
                           echo '<p class="empty">no products found!</p>';
                        }
                        ?>
                     </div>
                  </div>
               </section>
      <!-- end product section -->
      
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