<?php
if(! isset($page_name)){
    $page_name = '';
}
?>
<nav class="navbar navbar-expand-lg bg-white border-bottom border-primary">
    <div class="container">
        <a class="navbar-brand" href="index_.php">Flower Delivery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $page_name=='product-list' ? 'active' : '' ?>">
                    <a class="nav-link" href="product-list.php">Products</a>
                </li>
                <li class="nav-item <?= $page_name=='data-insert' ? 'active' : '' ?>">
                    <a class="nav-link" href="cart-list.php">Shopping Cart
                        <span class="badge bg-danger cart-count"></span></a>
                        <!-- <span class="badge badge-pill badge-danger cart-count"></span></a> -->
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php // print_r($_SESSION['loginUser'])  ?>
                <?php if(isset($_SESSION['loginUser'])):  ?>
                    <li class="nav-item">
                        <a class="nav-link"><?= $_SESSION['loginUser']['nickname'] ?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="order_detail.php">訂單記錄</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">修改會員資料</a>
                    </li>
                  
                    <li class="nav-item ">
                        <a class="nav-link" href="logout-api.php">登出</a>
                    </li>
                <?php else:  ?>
                    <li class="nav-item <?= $page_name=='login' ? 'active' : '' ?>">
                        <a class="nav-link" href="login.php">登入</a>
                    </li>
                    <li class="nav-item <?= $page_name=='data-insert' ? 'active' : '' ?>">
                        <a class="nav-link" href="register.php">註冊</a>
                    </li>
                <?php endif;  ?>
            </ul>
        </div>
    </div>
</nav>
<style>
    #navbarSupportedContent .nav-item.active {
        background-color: #FFB380;
    }
</style>