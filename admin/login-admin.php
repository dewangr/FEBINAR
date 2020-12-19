<?php 
session_start();
        include '../koneksi.php';
        if(isset($_SESSION['username'])){
            header('location:index.php');
        }

    if(isset($_POST["signin"])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $cek = mysqli_query($koneksi,"SELECT * FROM login_admin WHERE username = '$username'");

        if($cekk= mysqli_fetch_assoc($cek)){
            if($password == $cekk['password']){
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;
                header("Location: index.php");
            }
        }
        $error=true;
        if(isset($error)){
            echo "<script>alert('Login gagal'); location='login-admin.php';</script>";
        }   
    }   
    
?>

<?php include 'navbar.php';?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Febinar Administrator</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .card{
            margin-left:28%;
        }
        .hover{
            background-color: rgba(247,247,247,0);
            
            margin-top:15px;
            padding-top:5px;
            padding-left:10px;
            padding-bottom:10px;
            padding-right:10px; 
            border-radius:5px;
            display: inline-block;
            width:135px;
        }    
        .hover:hover{
            color:rgb(0,123,255);
            background-color: rgba(247,247,247,1)
            }
            
    </style>
</head>
<body>
    <div class="card-md">
        <div class="container main">
            <div class="card" style="width:500px">
                <h3 class="card-header text-center">Administrator Login</h3>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                        <!--  <label for="email">Email address</label> -->
                            <input type="text" placeholder="Username" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <!-- <label for="password">Password</label> -->
                            <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                            <small><a href="">Forgot password?</a></small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="margin-top:15px; float:right;" name="signin">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>
</body>