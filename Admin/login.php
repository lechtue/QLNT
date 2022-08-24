<?php
session_start();
if (isset($_SESSION['Login'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Page </title>
    <!-- Favicon -->
    <link rel="icon" href="..\Webcontent\img\core-img\icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <form action="models/Login.php" method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" placeholder="Username" name="username" required class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" placeholder="Password" name="password" required class="form-control form-control-lg" />

                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


</body>

</html>