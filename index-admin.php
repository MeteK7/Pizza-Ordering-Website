<!DOCTYPE html>
<?php
include "session.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Management</title>
	<link href="css/admin-page.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/admin-scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="~/assets/demo/chart-area-demo.js"></script>
    <script src="~/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="~/assets/demo/datatables-demo.js"></script>
</head>
<body class="sb-nav-fixed">
<!--HEADER NAV-->
<nav class="sb-topnav navbar navbar-expand navbar-dark nav-admin-top">
    <a class="navbar-brand">Management</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebar-toggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-info btn-outline-light" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="user-dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user-dropdown">
                <a class="dropdown-item">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <a class="dropdown-item" href="#">Home Page</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="cursor: pointer;">Logout</a>
                <form id="form-logout" class="form-inline"><!--LOGOUT FORM HERE--></form>
            </div>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion nav-admin-side" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Customer Management
            </a>
            <a class="nav-link" href="products.php">
                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                Products
            </a>
            <a class="nav-link" href="profit.php">
                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                Profit
            </a>
            <a class="nav-link">
                <div class="sb-nav-link-icon"><i class="fas fa-pen"></i></div>
                Create a Post
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?php echo $_SESSION['username']; ?>
    </div>
</nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                
            </main>
           <footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="footer-about col-md-4 col-lg-4 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <img class="logo-footer" src="/img/logo.png" alt="logo" data-at2x="assets/img/logo.png">
                    <p>
                    PIZZA ORDERING WEBSITE
                    </p>
                    <p>
                        Thank you for visiting our website.
                    </p>
                </div>
                <div class="footer-contact col-md-4 col-lg-4 offset-lg-1 wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                    <h3>Contact</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Arsuz 31225, Hatay TURKEY</p>
                    <p><i class="fas fa-phone"></i> Phone: (0090) 549 268 1421</p></li>
                    <p><i class="fas fa-envelope"></i> Email: <a href="mailto:metekaba96@gmail.com">metekaba96@gmail.com</a></p>
                    <p><i class="fab fa-skype"></i> Skype: live:metekaba</p>
                </div>
                <div class="footer-social col-md-4 col-lg-3 wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h3>Follow us</h3>
                    <p>
                        <a href="https://www.instagram.com/metekaba/?hl=en"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/mete-kaba-89b5221b8/"><i class="fab fa-linkedin"></i></a>
                        <a href="https://github.com/MeteK7"><i class="fab fa-github"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom" style="text-align:center">
        <div class="container">
                <div class="footer-copyright">
                    <p>&copy; <?php echo date("Y"); ?> <a>Privacy</a></p>
                </div>
        </div>
    </div>
</footer>
        </div>
</div>
</body>
</html>