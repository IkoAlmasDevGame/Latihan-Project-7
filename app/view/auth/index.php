<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Bebas 2</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <?php 
            require_once("../../database/koneksi.php");
            if(isset($_GET["act"])){
                session_start();
                if($_GET["act"] == "signin"){
                    if(isset($_POST["submit"])){
                        $userEmail = htmlspecialchars($_POST["userEmail"]);
                        $password = htmlspecialchars($_POST["password"]);
                        password_verify($password, PASSWORD_DEFAULT);

                        if($userEmail == "" || $password == ""){
                            header("location:index.php");
                            exit(0);
                        }

                        $table = "tb_user";
                        $sql = "SELECT * FROM $table WHERE email = '$userEmail' and password = '$password' || username='$userEmail' and password='$password'";
                        $db = $configs->prepare($sql);
                        $db->execute();
                        $cek = $db->rowCount();

                        if($cek > 0){
                            $response = array($userEmail, $password);
                            $response[$table] = array($userEmail, $password);
                            if($row = $db->fetch()){
                                if($row["user_level"] == "Pelanggan"){
                                    $_SESSION["id"] = $row["id_user"];
                                    $_SESSION["email_pengguna"] = $row["email"];
                                    $_SESSION["username"] = $row["username"];
                                    $_SESSION["nama_pengguna"] = $row["nama"];
                                    $_SESSION["user_level"] = "Pelanggan";
                                    header("location:../dashboard/index.php?nama=".$_SESSION["nama_pengguna"]);
                                }
                                $_SESSION["status"] = true;
                                array_push($response[$table], $response);
                                exit(0);
                            }else{
                                $_SESSION["status"] = false;
                                header("location:index.php");
                                exit(0);
                            }
                        }
                    }    
                }
                if($_GET["act"] == "register"){
                    if(isset($_POST["submits"])){
                        $email = htmlspecialchars($_POST["email"]);
                        $username = htmlspecialchars($_POST["username"]);
                        $password = htmlspecialchars($_POST["password"]);
                        $nama = htmlspecialchars($_POST["nama"]);
                        $user_level = "Pelanggan";

                        $table = "tb_user";
                        $sql = "INSERT INTO $table (email,username,password,nama,user_level) VALUES (?,?,?,?,?)";
                        $a = array($email,$username,$password,$nama,$user_level);
                        $row = $configs->prepare($sql)->execute($a);
                        header("location:index.php");
                    }
                }
            }
        ?>
    </head>

    <body class="bg-info" onload="startTime()">
        <div class="app">
            <div class="layout">
                <nav class="navbar navbar-expand-lg bg-light">
                    <header class="container-fluid">
                        <a href="index.php" class="navbar-brand">Dashboard Bebas 2</a>
                        <button type="button" class="navbar-toggler" data-bs-target="#navbarToggle"
                            data-bs-toggle="collapse" aria-expanded="false" aria-controls="navbarToggle">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <aside class="collapse navbar-collapse" id="navbarToggle">
                            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                                <li class="nav-item">
                                    <a href="../index.php" aria-current="page" class="hover fs-5 nav-link">
                                        Beranda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="auth/index.php" aria-current="page" class="hover fs-5 nav-link">
                                        Login
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </header>
                </nav>

                <section class="min-vh-100">
                    <div class="container-md container-lg py-5 p-5 pt-5 mt-5 bg-light">
                        <div class="container-md container-lg rounded-3 py-5 p-5 pt-5 mb-5 bg-dark">
                            <div class="d-flex justify-content-around align-items-start flex-wrap">
                                <div class="container-fluid col-md-6 col-lg-6 mb-2 mb-lg-2">
                                    <div class="card bg-light">
                                        <div class="card-header bg-transparent">
                                            <h4 class="card-title fs-4 font-timesnew">Login</h4>
                                        </div>
                                        <div class="card-body bg-transparent">
                                            <form action="index.php?act=signin" method="post">
                                                <div class="row align-items-center form-group mb-2 mb-lg-0">
                                                    <label for="userMail" class="input-group-addon">Email /
                                                        Username</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="userMail" id="userMail"
                                                                class="form-control"
                                                                placeholder="masukkan username atau email anda ..."
                                                                required aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="passMail" class="input-group-addon">Kata
                                                        Sandi</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="password" name="password" id="passMail"
                                                                class="form-control"
                                                                placeholder="masukkan kata sandi anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <p class="card-footer container">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary hover">
                                                            <i class="fa fa-sign-in-alt"></i>
                                                            <span>Login</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-danger hover">
                                                            <i class="fa fa-eraser"></i>
                                                            <span>Hapus</span>
                                                        </button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid col-md-6 col-lg-6 mb-2 mb-lg-2">
                                    <div class="card bg-light">
                                        <div class="card-header bg-transparent">
                                            <h4 class="card-title fs-4 font-timesnew">Register</h4>
                                        </div>
                                        <div class="card-body bg-transparent">
                                            <form action="index.php?act=register" method="post">
                                                <div class="row align-items-center form-group mb-2 mb-lg-0">
                                                    <label for="eMail" class="input-group-addon">Email</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="email" name="email" id="eMail"
                                                                class="form-control"
                                                                placeholder="masukkan email baru anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="uSername" class="input-group-addon">Username</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="username" id="uSername"
                                                                class="form-control"
                                                                placeholder="masukkan username baru anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2"></div>
                                                    <label for="pass" class="input-group-addon">Kata
                                                        Sandi</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="password" name="password" id="pass"
                                                                class="form-control"
                                                                placeholder="masukkan kata sandi anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                    <label for="uName" class="input-group-addon">nama panggilan</label>
                                                    <div class="input-group-text form-control">
                                                        <div class="input-group">
                                                            <input type="text" name="nama" id="uName"
                                                                class="form-control"
                                                                placeholder="masukkan nama panggilan anda ..." required
                                                                aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <p class="card-footer container">
                                                        <button type="submit" name="submits"
                                                            class="btn btn-primary hover">
                                                            <i class="fa fa-save"></i>
                                                            <span>Simpan</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-danger hover">
                                                            <i class="fa fa-eraser"></i>
                                                            <span>Hapus</span>
                                                        </button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <footer class="py-3 my-4">
                        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                            <li class="nav-item"><a href="#beranda" class="nav-link px-2 text-muted">Home</a></li>
                        </ul>
                        <p class="text-center text-muted" id="time"></p>
                        <p class="text-center text-muted">&copy; Dashboard Latihan 6</p>
                    </footer>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
            function startTime() {
                var day = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday ", "Friday", "Saturday"];
                var today = new Date();
                var tahun = today.getFullYear();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('time').innerHTML =
                    day[today.getDay()] + ", " + h + ":" + m + ":" + s + ", " + tahun;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }; // add zero in front of numbers < 10
                return i;
            }
            </script>
    </body>

</html>