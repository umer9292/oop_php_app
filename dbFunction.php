<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 10/30/2019
 * Time: 12:56 PM
 */

require_once 'db_connect.php';
class dbFunction extends  dbConnect
{
    function __construct()
    {
        parent::__construct();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }



    public function userRegister($username, $email, $password)
    {
        $password = md5($password);
        $registerSql = 'INSERT INTO users (user_name, email, passwrd) VALUE ("'.$username.'","'.$email.'","'.$password.'")';
        $result = mysqli_query($this->dbCon, $registerSql);
        if ($result) {
            header('location: login.php');
        } else {
            die(mysqli_error($this->dbCon));
        }
    }

    public function login($email, $password)
    {
        $password = md5($password);
        $loginSql = 'SELECT * FROM users WHERE email="'.$email.'" AND passwrd="'.$password.'"';
        $loginQuery = mysqli_query($this->dbCon, $loginSql) or die(mysqli_error($this->dbCon));
        if (mysqli_num_rows($loginQuery) == 1){
            $user = mysqli_fetch_array($loginQuery, true);
                $_SESSION['user_logged_in'] = [
                'user_id' => $user['id'],
                'user_name' => $user['user_name'],
                'email' => $user['email']
            ];
                return true;
        } else {
            return false;
        }
    }

    public function isUserExist($email)
    {
        $userSql = 'SELECT * FROM users WHERE email="'.$email.'"';
        $userExist = mysqli_query($this->dbCon, $userSql) or die(mysqli_error($this->dbCon));
        if (mysqli_num_rows($userExist) > 0){
            return false;
        } else {
            return true;
        }
    }

    public function comparePassword($newPassword)
    {
        $sql = 'SELECT * FROM users WHERE id = "'.$_SESSION['user_logged_in']['user_id'].'"';
        $query = mysqli_query($this->dbCon, $sql) or die(mysqli_error($this->dbCon));
        if ($query->num_rows == 1) {

            $newPassword = md5($newPassword);
            $updateSql = 'UPDATE users SET 
            passwrd = "'.$newPassword.'",
            updated_at = "'.date('Y-m-d h:i:s').'"
            WHERE id = "'.$_SESSION['user_logged_in']['user_id'].'"';
            $updateQuery = mysqli_query($this->dbCon, $updateSql) or die(mysqli_error($this->dbCon));
            return true;
        } else {
            return false;
        }
    }
}