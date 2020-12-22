<?php
session_start();

//menghancurkan $_SESSION['user']
session_destroy();
echo "<script>location='../mainmenu.php';</script>";
?>