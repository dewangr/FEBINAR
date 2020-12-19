<?php include 'koneksi.php';
session_start();
?>
<?php 
    if(isset($_POST["signin"])){
        $username=$_POST['username'];
        $password=$_POST['password'];

    $cek = mysqli_query($koneksi,"SELECT* FROM data_user WHERE username_user = '$username'");

    if(mysqli_num_rows($cek) == 1){
        $result = mysqli_fetch_assoc($cek);
        if($result['level_user'] == 'provider'){
            if($result['keterangan_acc'] == 'acc'){
                if(password_verify($password,$result['password_user'])){
                    $_SESSION["login"] = true;
                    $_SESSION["username"] = $result['username_user'];
                    header("Location: ./penjual/page-penjual.php");
                }
            }
            else{
                if(password_verify($password,$result['password_user'])){
                    $_SESSION["login"] = true;
                    $_SESSION["username"] = $result['username_user'];
                    echo "<script>alert('Akun Anda belum tervalidasi. Mohon validasi akun terlebih dahulu untuk melanjutkan.');
                        location='validasi.php?username=$username';
                    </script>";
                }
            }
        }
        else if($result['level_user']  == "seeker"){
            if(password_verify($password,$result['password_user']) ){
                $_SESSION["login"] = true;
                $_SESSION["username"] = $result['username_user'];
                header("Location: mainmenu.php");
            }
        }
    }
    $error=true;
}
?>
<?php include 'navbar.php';?>
<head>
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
    <?php 
        if(isset($error)){ 
        echo "<script>alert('Login gagal'); location='login.php';</script>";
    } ?>
    <div class="card-md">
        <div class="container main">
            <div class="card" style="width:500px">
                <h3 class="card-header text-center">Log in to your account</h3>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Username" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                            <small><a href="#">Forgot password?</a></small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="margin-top:15px; float:right;" name="signin">Sign in</button>
                        <strong><a class="hover" href="regis.php" style="text-decoration:none;">Create account</a></strong>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>
</body>
