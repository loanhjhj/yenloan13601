<?php
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="shortcut icon" src="images/logo.png" type="">
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
                <header class="header_section">
                    <div class="container">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="index.php"><img width="250" src="images/logo.png" alt="#" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="product.php">Products</a>
                                </li>
                                <li class="nav-item">
                                <?php          
                                        $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                                        $select_profile->execute([$user_id]);
                                        if($select_profile->rowCount() > 0){
                                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                                ?>
                                    <a href="logout.php" class="delete-btn nav-link" onclick="return confirm('logout from the website?');">Logout</a> 
                                    <?php
                                        }else{
                                    ?>
                                    <div class="flex-btn">
                                        <a class="nav-link" href="login.php">Login</a>
                                    </div>
                                    <?php
                                           }
                                    ?>
                                </li>
                                <li class="nav-item">
                                <form class="form-inline" action="search.php" method="post">
                                    <input class="form-control " type="search" placeholder="Search" name="search_box"  aria-label="Search">
                                    <button class="btn btn-outline-white mb-3" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                </li>
                                &emsp;&emsp;
                                <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="btn fa fa-shopping-cart" style="font-size:22px;"></i></a>
                                </li>           
                                
                            </ul>
                        </div>
                    </nav>
                    </div>
                </header>
                <!-- end header section -->
            </div>
    </body>
</htmml>