<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location:../index.php");
    exit;
}

require "function/functions.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) == 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            // set session
            $_SESSION['login'] = true;

            echo "<script>
                alert('Login berhasil');
                document.location.href='../index.php';
            </script>";
            header('Location: ../index.php');
            exit;
        } else{
            echo "<script>
            alert('password salah');
        </script>";
        }
    } else{
        echo "<script>
            alert('username salah');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets-selawi/logo-selawi.jpeg">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets-selawi/logo-selawi.jpeg">
    
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 p-5" style="border: 1px solid black">
                <h2 class="mb-5 text-center">Login Admin BPP Selaawi</h2>
                <center>
                    <img src="../../assets-selawi/LogoKabupatenGarut.jpg" alt="" class="mb-3" style="width: 60%">
                </center>
                <form action="" method="post">
                    <div class="form-group">
                        <!-- <label for="username">Username</label> -->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label for="password">Password</label> -->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <center>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



