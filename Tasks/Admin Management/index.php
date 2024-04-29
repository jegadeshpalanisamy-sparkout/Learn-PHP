<?php
include_once "DbConfig.php";
if (isset($_POST['login'])) {
    $lg_email = mysqli_real_escape_string($con, $_POST['email']);
    $lg_password = md5($_POST['password']);

    // echo $lg_email .$lg_password;
    $checkingQuery = "SELECT * FROM admindetails WHERE Email='$lg_email' && Password='$lg_password'";
    $res = mysqli_query($con, $checkingQuery);
    //var_dump($res);
    if (mysqli_num_rows($res) == 1) {
        header('location:./admin/admin_dashboard.php');
    } else {

        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="main">

            <div class="row form-width">

                <?php
                if (isset($error)) {
                    echo "<div class='bg-danger text-center err-width'><span class='error-msg'>$error</span></div>";
                }

                ?>

                <div class="form-border ">
                    <form action="" method="POST">
                        <div class="text-center">
                            <h3>Login</h3>
                        </div>
                        <div class="form-control">

                            <div class="m-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="m-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>

                            </div>

                            <div class="text-center btn-clr">
                                <input type="submit" value="Submit" name="login" class="btn ">
                            </div>
                        </div>

                        <div class="text-center">You don't have already account? <a href="signup.php">Sign up</a></div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</body>

</html>