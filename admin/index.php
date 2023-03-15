<?php
include '../partials/connect.php';
session_start();
include 'head.php';

include 'header.php';

?>
         <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 style="text-align: center; font-size: 40px" class="h3 mb-2 text-gray-800"><b>QUẢN LÝ SẢN PHẨM</b></h1>
                    <?php 
                        $select_products = $conn->prepare("SELECT * FROM products"); 
                        $select_products->execute();
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <button name="pd_add"  type="submit" class="btn btn-success"><a href="pd_add.php" style="text-decoration: none; color: white"><i class="fas fa-plus"></i> Thêm sản phẩm</a></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form action="" method="post" class="box">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th><b style="font-size: 18px;">Product ID</b></th>
                                            <th><b style="font-size: 18px;">Name</b></th>
                                            <th><b style="font-size: 18px;">Images</b></th>
                                            <th><b style="font-size: 18px;">Details</b></th>
                                            <th><b style="font-size: 18px;">Price</b></th>
                                            <th><b style="font-size: 18px;">Activites</b></th>
                                       
                                        </tr>
                                    </thead>
                                    <?php
                                        while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
                                    ?>  
                                   <tr style="text-align: center;">
                                            <td>
                                                <input type="hidden" name="id" value="<?= $fetch_product['id']; ?>">
                                                <div class=""><?= $fetch_product['id']; ?></div>
                                            </td>
                                            <td>
                                                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                                                <div class="name"><?= $fetch_product['name']; ?></div>
                                            </td>
                                            <th>
                                                <input type="hidden" name="image" value="<?= $fetch_product['image']; ?>"> 
                                                <img style="height: 175px;" src="../uploaded_img/<?= $fetch_product['image']; ?>" alt="">
                                            </td>
                                            <td>
                                                <input type="hidden" name="detail" value="<?= $fetch_product['detail']; ?>">
                                                <div class=""><?= $fetch_product['detail']; ?></div>
                                            </td>
                                            <td>
                                                <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                                                <div class="price"><?= $fetch_product['price']; ?>$</div>
                                            </td>
                                            <td>
                                                <a href="pd_edit.php?id=<?php echo $fetch_product['id']; ?>" class="btn"><i class="fas fa-edit"></i></a>
                                                <a href="pd_delete.php?id=<?php echo $fetch_product['id']; ?>" onclick="return confirm('Bạn muốn xóa sản phẩm?');" class="btn"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    ?> 

                                </form>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

?>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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