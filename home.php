<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 10/30/2019
 * Time: 12:57 PM
 */

include ('dbFunction.php');

if (!isset($_SESSION['user_logged_in']) && empty($_SESSION['user_logged_in'])) {
    header('location: login.php');
    exit();
}
//print_r($_SESSION['user_logged_in']);
?>

<?php include ('includes/header.php')?>

    <div id="loader"></div>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3 home">
                    <p class="text-center text-light font-italic">Learn About Oop PHP</p>
                    <h1 class="text-center text-light font-weight-bold">HOME PAGE</h1>
                </div>
            </div>
        </div>
    </div>

<?php include ('includes/footer.php')?>