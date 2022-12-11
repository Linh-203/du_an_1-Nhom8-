<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="" class="navbar-brand mx-4 mb-3" >
            <img src="../src/image/tech.png" alt="" width="50%" style="margin-left: 30px;margin-bottom: 15px;">
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt="" style="width: 50px; height: 50px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"></h6>
                <span>Chào,  <?php echo$_SESSION["username"]  ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="product.php?module=product" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Quản lý Sản Phẩm</a>
            <a href="category.php?module=category" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Quản lý Danh mục</a>
            <a href="user.php?module=user" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Quản lý User</a>
            <a href="comment.php?module=comment" class="nav-item nav-link"><i class="fa fa-comment me-2"></i>Quản lý Comment</a>
            <a href="don_hang.php" class="nav-item nav-link"><i class="bi-bag-fill me-2"></i>Quản lý Đơn hàng</a>
            <a href="news.php?module=news" class="nav-item nav-link"><i class="fa fa-newspaper"></i>  Quản lý Tin Tức</a>
            <a href="voucher.php" class="nav-item nav-link"><i class="bi-card-image me-2"></i>Quản lý voucher</a>
            <a href="doanh_thu.php?module=turnover" class="nav-item nav-link"><i class="fa fa-money-bill"></i>  Quản lý Doanh thu</a>
            <a href="thongke.php?module=statistical" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Thống kê</a>
            <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../index.php" class="dropdown-item">Trang chủ</a>
                        </div>
                    </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Message</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="public/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                <small>15 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notificatin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Password changed</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all notifications</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Content -->
    <?php
        include("content.php");
    ?>
</div>