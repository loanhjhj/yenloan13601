<?php
session_start();
include '../partials/connect.php';
include 'head.php';
include 'header.php';


if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];

    // xử lý hình ảnh
    $file = $_FILES['image'];
    $image = $file['name'];
    $image_tmp=$_FILES['image']['name'];

    if(isset($_FILES['image'])){
        if($file['type']== 'image/jpeg'||$file['type']== 'imgae/jpg'||$file['type']== 'image/png'){

            move_uploaded_file($image_tmp,'../uploaded_img/'.$image);
            
            $insert_product =$conn->prepare("INSERT INTO products(name, price, image, detail)
                              VALUES ('".$name."','".$price."','".$image."','".$detail."')");
            $insert_product->execute();
            echo "Thêm sản phẩm thành công";
        }
      
        else{
            echo"Không thể thêm sản phẩm này!";
        }
    }
}


?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
                    <h1 style="text-align: center; font-size: 40px" class="h3 mb-2 text-gray-800"><b>THÊM SẢN PHẨM MỚI</b></h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <form role="form" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label><b>Tên sản phẩm</b></label>
                                                <input required name="name" class="form-control" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Giá sản phẩm</b></label>
                                                <input required name="price" type="number" min="0" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <label><b>Mô tả sản phẩm</b></label>
                                            <textarea required name="detail" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Ảnh sản phẩm</b></label>
                                            <input required name="image" type="file">
                                            <br>
                                        </div>
                                        <button name="add" type="submit" class="btn btn-success">Thêm mới</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.col-->
                    </div><!-- /.row -->
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



