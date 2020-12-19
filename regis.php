<?php 
include 'koneksi.php';

    if(isset($_POST["signup"])){
        $username= strtolower(stripslashes($_POST['username']));
        $email = $_POST['email'];
        $password= mysqli_real_escape_string($koneksi,$_POST['password']);
        $confirm= mysqli_real_escape_string($koneksi,$_POST['confirm']);
        $lvluser=$_POST['userlevel'];

        if($password !== $confirm){
            echo "<script>
                    alert('Password tidak sama dengan konfirmasi password!');
                    location='regis.php';
                </script>";
            exit;
        }

        $cek = mysqli_query($koneksi,"SELECT FROM data_user WHERE username='$username'");

        if( mysqli_fetch_assoc($cek)) {
            echo "<script>
                    alert('Username sudah digunakan.'); 
                    location='regis.php';
                </script>";
            exit;
        }
        else{
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

    
        if($lvluser == "seeker") {
        mysqli_query($koneksi, "INSERT INTO `data_user`(`id_user`, `username_user`, `password_user`, `email_user`, `level_user`,`keterangan_acc`) 
                                VALUES ('', '$username', '$password', '$email', '$lvluser','acc')");
            echo "<script>
                    alert('user berhasil ditambahkan.'); location='login.php';
                </script>";
        }
        else{
            mysqli_query($koneksi, "INSERT INTO `data_user`(`id_user`, `username_user`, `password_user`, `email_user`, `level_user`,`keterangan_acc`) 
                                VALUES ('', '$username', '$password', '$email', '$lvluser','non')");
            echo "<script>
                    alert('User berhasil ditambahkan. Validasi data untuk menyelesaikan proses pendaftaran'); 
                    location='validasi.php?username=$username';
                </script>";
        }
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
            width:131px;
        }    
        .hover:hover{
            color:rgb(0,123,255);
            background-color: rgba(247,247,247,1)
            }
            
    </style>
</head>
<div class="card-md">
    <div class="container main">
        <div class="card" style="width:500px">
            <h3 class="card-header text-center">Create your Febinar Account</h3>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <input type="text" placeholder="Username" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <!-- <label for="email">Email address</label> -->
                        <input type="email"  placeholder="Email address"class="form-control" id="email" name="email">
                    </div>
                    <!-- <div class="form-group"> -->
                        <div class="form-row">
                            <div class="form-group col">
                                <!-- <label for="password">Password</label> -->
                                <input type="password" placeholder="Password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group col">
                                <input type="password" placeholder="Confirm" class="form-control" id="confirm" name="confirm">
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <!-- <label for="typeacc">Account type</label> -->
                        <select class="form-control" name="userlevel">
                            <option >Account type:</option>
                            <option name="userlevel" value="provider">Provider</option>
                            <option name="userlevel" value="seeker">Seeker</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin-top:15px; float:right;" name="signup">Sign up</button>
                    <strong><a class="hover" href="login.php" style="text-decoration:none;">Sign in instead</a></strong>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>