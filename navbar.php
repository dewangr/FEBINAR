<?php include 'koneksi.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Febinar</title>
    <link rel="stylesheet" href="./assets/css/style2.css">
    <style>
        .img-logo{
            height:70px;
            width:auto;
        }
        .header{
            position:fixed;
            top:0;
            z-index:1000;
            width:100%;
        }
        .searching{
            border-radius:1px;
        }
    </style>
</head>
<body>
    <div class="navbar-wrapper header">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #16213e;">
            <div class="container pt-4">
                <a href="mainmenu.php"><img class="img-logo pb-1" src="assets/img/febinar-logo.png" alt="Beranda"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ml-auto px-2">
                        <form class="form-inline" action="searchpage.php" method="post">
                            <div class="input-group mb-3">
                                <input style="width:600px;" type="search" name="keyword" class="form-control searching" placeholder="Cari webinar.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-outline-secondary mr-sm-4 searching" type="button" name="cari" value="Cari"></input>
                                </div>
                            </div>
                        </form>
                        <a href="produkpage.php" class="nav-item nav-link px-2">Webinar</a>
                        <a href="keranjang.php" class="nav-item nav-link px-3" ><i class="fa fa-shopping-cart"></i> </a>
                        
                        <?php if(!isset($_SESSION['username'])): ?>
                            <a href="regis.php" class="nav-item nav-link px-2" id="regis">Sign up</a>
                            <a href="login.php" class="nav-item nav-link px-2">Sign in</a>
                        <?php else: ?>
                                <a class="nav-item nav-link px-3" href="logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                        <?php endif ?>
                    </div>
                </div>  
            </div>
        </nav>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>