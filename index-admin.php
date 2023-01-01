<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="user-management.php">Users</a></p>
      <p><a href="#">Foods</a></p>
      <p><a href="#">Beverages</a></p>
      <p><a href="#">Desserts</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
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

</body>
</html>