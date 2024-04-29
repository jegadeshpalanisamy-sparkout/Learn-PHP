<?php
include_once "DbConfig.php";
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['userName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);


    $password =  $_POST['password'];
    $cPassword = $_POST['Cpassword'];
    $mobNum = $_POST['mobileNumber'];
    $gender = $_POST['gender'];
    $error = [];
    $minLength = 8;
    if (strlen($password) < $minLength) {
        $error[] = "Password must be at least $minLength characters long.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Invalid email format";
        } else {
            if (strlen($mobNum) != 10) {
                $error[] = "Mobile number must be 10 digits";
            } else {

                $password =  md5($_POST['password']);
                $cPassword = md5($_POST['Cpassword']);
                $checkUser = "SELECT * FROM admindetails WHERE Email='$email' && Password='$password'";
                $result = mysqli_query($con, $checkUser);
                if (mysqli_num_rows($result) > 0) {
                    $error[] = "user is already exist";
                } else {
                    if ($password != $cPassword) {
                        $error[] = "Password mismatched";
                    } else {
                        $insertValues = "INSERT INTO admindetails (Name,Email,Password,MobileNumber,Gender) VALUES('$name','$email','$password','$mobNum','$gender')";
                        $insertResult = mysqli_query($con, $insertValues);
                        // echo "inserted successfully";
                        header('location:index.php');
                    }
                }
            }
        }
    }

    // echo $name . $email  . $password  . $cPassword . $gender;


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
                    foreach ($error as $err) {
                        echo "<div class='bg-danger text-center err-width'><span class='error-msg '>$err</span></div>";
                    }
                }

                ?>
                <div class="signform-border ">
                    <div class="text-center">
                        <h3>Sign Up</h3>
                    </div>
                    <form action="" method="POST">
                        <div class="form-control">
                            <div class="m-3">
                                <input type="text" name="userName" class="form-control" placeholder="User name" required>
                            </div>
                            <div class="m-3">
                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="m-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="m-3">
                                <input type="password" name="Cpassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="m-3">
                                <input type="text" name="mobileNumber" class="form-control" placeholder="Mobile number" required>
                            </div>
                            <div class="m-3 text-center">
                                <span class="me-1">Gender:</span>
                                <input type="radio" name="gender" value="male">Male</input>
                                <input type="radio" name="gender" value="female">Female</input>
                            </div>
                            <div class="text-center  btn-clr">
                                <input type="submit" value="Submit" name="submit" class="btn ">
                            </div>
                        </div>
                        <div class="text-center">You have already account? <a href="index.php">Login</a></div>

                    </form>


                </div>
            </div>

        </div>

    </div>
</body>

</html>