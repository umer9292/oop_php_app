<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 10/30/2019
 * Time: 1:01 PM
 */
?>

        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var preloader = document.getElementById("loader");
                function myFunction(){
                    preloader.style.display = 'none';
                };
            $(document).ready(function(){
                myFunction();
                setTimeout(function () {
                    $("#loader").css('display','block'); }, 5000)
            });
        </script>
    </body>
</html>