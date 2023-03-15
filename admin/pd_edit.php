<?php
session_start();
include '../partials/connect.php';
include 'head.php';
include 'header.php';

?>
    <?php 
        $id=$_GET['id'];
        $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = '$id'"); 
        $select_products->execute();
        $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
    ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
                    <h1 style="text-align: center; font-size: 40px" class="h3 mb-2 text-gray-800"><b>CHỈNH SỬA SẢN PHẨM</b></h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <form role="form" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label><b>Tên sản phẩm</b></label>
                                                <input required name="name" class="form-control" value="<?= $fetch_product['name'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Giá sản phẩm</b></label>
                                                <input required name="price" type="number" min="0" value="<?= $fetch_product['price'];?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label><b>Mô tả sản phẩm</b></label>
                                            <textarea required name="detail" class="form-control" rows="3"><?= $fetch_product['detail']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Ảnh sản phẩm</b></label>
                                            <input required name="image" type="file">
                                            <img src="../uploaded_img/<?php echo $fetch_product['image'] ?> " width="150px" >
                                            <br>
                                        </div>
                                        <button name="edit" type="submit" class="btn btn-success">Cập nhật</button>
                                    
                                    <?php 
                                        if (isset($_POST['edit'])){
                                        $id=$_GET['id'];
                                        $name=$_POST['name'];
                                        $price=$_POST['price'];
                                        $detail=$_POST['detail'];

                                        // xử lý hình
                                        $file = $_FILES['image'];
                                        $image = $file['name'];
                                        $image_tmp=$_FILES['image']['name'];
                                        if($image!=''){
                                            move_uploaded_file($image_tmp,'../uploaded_img/'.$image);
                                        $stmt = $conn->prepare("UPDATE `products` SET name='$name', price='$price', image='$image', detail='$detail' WHERE id='$id'");
                                        $stmt->execute();
                                        echo "Cập nhật sản phẩm thành công!";

                                        } else {
                                            echo "Không thể cập nhật sản phẩm này!";
                                        }

                                        
                                        exit();
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>



