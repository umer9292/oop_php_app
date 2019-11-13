<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 10/30/2019
 * Time: 12:56 PM
 */

include 'dbFunction.php';

    $funcObj = new dbFunction();
    if (isset($_POST['submit'])){
        $username = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($password == $confirmPassword) {
            $isExistEmail = $funcObj->isUserExist($email);
            if ($isExistEmail){
                $register = $funcObj->userRegister($username, $email, $password);
                if ($register){
                    echo '<script>alert("Registration Successful")</script>';
                } else {
                    echo '<script>alert("Registration Cannot Successful")</script>';
                }
            } else {
                echo '<script>alert("Email Already Exist")</script>';
            }
        } else {
            echo '<script>alert("Password Not Match")</script>';
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>OOP PHP</title>
</head>
<body>
    <div class="registerBg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 offset-xl-3 offset-lg-3 offset-md-3">
                    <div class="card registerCard">
                        <div class="card-body">
                            <h5 class="card-title registerCard_title">REGISTER FORM</h5>
                            <p class="registerCard_subtitle">Please fill this form to create an account.</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="user_name" class="form-control registerCard_input" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control registerCard_input" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text registerCard_emailInput_text">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="showPass" name="password" class="form-control registerCard_input" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <input type="password" id="showPass1" name="confirm_password" class="form-control registerCard_input" placeholder="Enter confirm password">
                                </div>
                                <div class="form-group form-check text-right">
                                    <input type="checkbox"  onclick="myFunction()"  class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Show Password </label>
                                </div>
                                <button type="submit" name="submit" class="btn signUp_btn">Sign up</button>
                                <p class="linkText">Already have an account? <a href="login.php" class="link">Login here</a>.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <script>
            function myFunction() {
                var x = document.getElementById("showPass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
                var y = document.getElementById("showPass1");
                if (y.type === "password") {
                    y.type = "text";
                } else {
                    y.type = "password";
                }
            }
        </script>

</body>
</html>