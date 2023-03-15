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
   <body>
      <div class="hero_area">
         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="images/CS.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Shoping Online
                                    </span>
                                    <br>
                                    Mua sắm thả ga!!!
                                 </h1>
                                 <p>
                                Chất lượng hàng đầu & Giảm giá lớn! Giảm giá lớn cho hợp thời trang Áo quần nữ. Rất nhiều lựa chọn. Mua ngay nào!
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>
      <!-- end why section -->
      

            <!-- product section --> 
            <section class="product_section layout_padding">
                  <div class="container">  
                     <div class="heading_container heading_center">
                        <h2>
                           Our <span>products</span>
                        </h2>
                     </div>
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
                                 <input type="hidden" name="status" value="<?= $fetch_product['detail']; ?>">
                                 <input type="hidden" name="image" value="<?= $fetch_product['image']; ?>">  
                                 <div class="options">
                                    <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                                    <input type="submit" value="add to cart" class="btn" name="add_to_cart">&nbsp;
                                    <input type="submit" value="detail item" class="btn" name="detail_item">
                                 </div>
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
                              </form>
                           </div>
                        </div>
                        <?php
                           }
                        }else{
                           echo '<p class="empty">no products found!</p>';
                        }
                        ?>
                     </div>
                     <!-- <div class="col-sm-6"> 
                        <div class="status"><?= $fetch_product['status']; ?><span>đ</span></div>
                     </div> -->
                  </div>
               </section>

      <!-- client section -->
      <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
               Customer Review
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/PF.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                           AAAA
                           </h5>
                           <p>                           
                           Là một người mua hàng, tôi đánh giá cao về chất lượng sản phẩm. Sản phẩm đẹp, giá cả phải chăng, giao hàng nhanh chóng!!!
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/H2.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                           BBBB
                           </h5>
                           <p>
                           Là một người mua hàng, tôi đánh giá cao về chất lượng sản phẩm. Sản phẩm đẹp, giá cả phải chăng, giao hàng nhanh chóng!!!
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/H3.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              CCCC
                           </h5>
                           <p>
                           Là một người mua hàng, tôi đánh giá cao về chất lượng sản phẩm. Sản phẩm đẹp, giá cả phải chăng, giao hàng nhanh chóng!!!
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- end client section -->
      <!-- footer start -->
      <?php include 'partials/footer.php' ?>
      <!-- footer end -->
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