<?php

include_once "../includes/functions.php";

if (isset($_SESSION['user'])) {
    redirect("index.php");
}

if (isset($_POST['login'])) {
    $msg = login($pdo);

    $msg = json_decode($msg);
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="./assets/css/demo.css"> -->
</head>
<style>
    .main-contents-area {
        background-color: white;
        border-radius: 20px;
        padding: 15px;
        position: relative;
        /* z-index: 100; */
    }

    .sign-input {
        border-radius: 3px;
        font-size: 16px;
        letter-spacing: 0px;
        color: black;
        font-weight: 500;
        padding: 10px 15px;
        width: 100%;
    }


    .login-header {
        height: 100vh;
        background-image: url('./assets/img/c934407a1cf19dc3c61f0f7060f5d362.jpeg');
        background-position: center;
        background-size: cover;
    }

    .login-form {
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.767);
        border-radius: 10px;
        min-width: 300px;
    }

    .btn-fill {
        background-color: #696cff;
        padding: 7px 15px;
        border-radius: 3px;
        font-size: 16px;
        color: white;
        font-weight: 500;
        text-decoration: none;
        border: 2px solid #696cff;
    }

    .main-heading {
        font-family: Bahnschrift;
        font-size: 26px;
        color: black;
        font-weight: 600;
    }
</style>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="d-flex justify-content-center align-items-center login-header">


        <form method="post" class="login-form">
            <!-- <img src="./assets/img/logo copy.png" alt=""> -->
            <?php if (isset($msg) && !empty($msg->error)) : ?>
                <small class="text-danger"><?php echo $msg->error ?></small>
            <?php endif; ?>
            <h1 class="main-heading mb-2 text-center mt-4">
                SIGN IN
            </h1>
            <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label sign-label">Email address</label> -->
                <input type="email" name="email" class="form-control sign-input w-100 mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
                <input type="password" name="password" class="form-control sign-input w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>
                <div class="d-flex align-items-center">

                    <!-- <p class="mb-0 pb-0 ask-acount mt-2">Don’t have an account? <a href="">Sign Up</a></p> -->
                </div>

                <div class="d-flex justify-content-center pt-2">
                    <button type="submit" name="login" class="main-btn btn-fill mt-4 ">Sign In</button>
                    <!-- <a href="index.html" class="btn-fill mt-4 ">Sign In</a> -->
                </div>
            </div>
        </form>



    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>