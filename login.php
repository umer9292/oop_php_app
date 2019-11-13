<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 10/30/2019
 * Time: 12:56 PM
 */

include 'dbFunction.php';

if(isset($_SESSION['user_logged_in']) && !empty($_SESSION['user_logged_in'])) {
    header('location: home.php');
    exit();
}

$funcObj = new dbFunction();

// function clean($string){
//    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
// }

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $funcObj->login($email, $password);
    if ($user){
        header('location: home.php');
    } else {
        echo '<script>alert("Email / Password Not Match")</script>';
    }
}
?>

<?php include('includes/header.php')?>
<div class="loginBg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="login_text">
                    <h1 class="h1text">
                        Welcome Back to
                        Skillshare :)
                    </h1>
                    <div class="headline"></div>
                    <h6 class="h6text">
                        Sign in to continue to your<br>
                        account.
                    </h6>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="card login_card mt-5">
                    <div class="card-body">
                        <h5 class="card-title login_card_title">LOGIN FORM</h5>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email" class="loginLabel">Email address :</label>
                                <input type="email" name="email" class="form-control login_card_input" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="loginLabel">Password :</label>
                                <input type="password" name="password" class="form-control login_card_input" id="password" placeholder="Enter password">
                            </div>
                            <div class="text-right">
                                <a href="register.php" class="newAccountLink">create new account.</a>
                            </div>
                            <button type="submit" name="submit" class="btn login_btn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php')?>