<?php
/**
 * Created by PhpStorm.
 * User: Umer
 * Date: 10/30/2019
 * Time: 12:55 PM
 */

require_once 'config.php';

    class dbConnect {

        public $dbCon;
        public function __construct()
        {
            $this->dbCon = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
            mysqli_select_db( $this->dbCon, DB_DATABASE);
            if (!$this->dbCon) die('Cannot connect to the database');
        }


        public function Close()
        {
           return  mysqli_close($this->dbCon);
        }
    }
