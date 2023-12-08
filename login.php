<?php

include ('function.php');

error_reporting(0);

session_start();

if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nama'] = $row['nama'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>

<div class="alert alert-warning" role="alert">
    <?php echo $_SESSION['error']?>
</div>

<main>
    <div class="login-flex-container">
        <div class="image-card">
            <img src="assets/img/Asset 2.png">
        </div>

        <div class="login-card">
            <div class="login-content">
                <div class="title">
                    <p class="judul">Selamat Datang</p>
                    <p>Sistem Informasi Zakat Fitrah</p>
                </div>

                <div class="form-login">
                    <form action="" method="post">
                        <div class="form-group-3">
                            <label class="form-label-login">Username</label>
                            <input class="form-control-2" type="text" name="username" placeholder="Masukkan username" value="<?php echo $username; ?>" required/>
                        </div>

                        <div class="form-group-3">
                            <label class="form-label-login">Password</label>
                            <input class="form-control-2" type="password" name="password" placeholder="Masukkan password" value="<?php echo $_POST['password']; ?>" required/>
                        </div>

                        <div class="form-group-btn-login">
                            <button class="btn-login" name="submit">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</main>

</body>
</html>