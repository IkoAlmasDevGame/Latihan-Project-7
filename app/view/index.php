<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Bebas 2</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                                    <a href="index.php" aria-current="page" class="hover fs-5 nav-link">
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
                    <div class="container-fluid py-5 p-5 bg-secondary pt-5 mt-5">
                        <div class="contaner-md container-lg bg-light rounded-1 mb-5 pb-5">
                            <h4 class="fs-2 fw-lighter font-monospace">
                                <span class="shadow-sm">Tema :</span>
                                <br>
                                <span class="shadow-sm">Dashboard Bebas 2</span>
                            </h4>
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