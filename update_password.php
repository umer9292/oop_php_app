<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 11/1/2019
 * Time: 12:10 PM
 */
include 'dbFunction.php';

if(!isset($_SESSION['user_logged_in']) && empty($_SESSION['user_logged_in'])) {
    header('location: login.php');
    exit();
}

$funcObj = new dbFunction();

if (isset($_POST['submit'])){
    $password = $_POST['password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword == $confirmPassword) {
        $pass = $funcObj->comparePassword($newPassword,$confirmPassword);
        if ($pass) {
            echo '<script>alert("Password")</script>';
        }else {
            echo '<script>alert("current password is wrong")</script>';
        }
    } else {
        die('Youer new and confirm password is not match');
    }


    header('location: home.php');
}
?>

<?php include ('includes/header.php')?>
    <div class="update_passBg">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-xl-4 offset-lg-4 offset-md-3">
                    <div class="card update_pass_card">
                        <div class="card-body">
                            <h5 class="card-title update_pass_card_title">PASSWORD UPDATE</h5>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control update_pass_card_input" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="new_password" class="form-control update_pass_card_input" placeholder="Enter new password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control update_pass_card_input" placeholder="Enter confirm password">
                                </div>
                                <button type="submit" name="submit" class="btn update_pass_btn">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ('includes/footer.php')?>
