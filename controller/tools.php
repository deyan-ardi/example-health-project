<?php
// defined('BASEPATH') or exit('No direct script access allowed');
class Tools
{
    public $username;
    public $password;
    public $u;
    public $p;
    public $data;

    public function __construct()
    {
        $this->username = @htmlentities(strtolower($_POST['username']));
        $this->password = @htmlentities(strtolower($_POST['password']));
    }

    public function login()
    {
        if ($this->verify()) {
            $_SESSION['username'] = $this->username;
            $_SESSION['password'] = $this->password;
            $_SESSION['user'] = true;
            header("Location: ../admin/administration.php");
            die();
        } else {
            header("Location: ../admin/login.php");
            die;
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
        session_start();
        session_unset();
        header("Location: ../admin/login.php");
        die();
        }
    }

    public function verify()
    {
        $d = file_get_contents("../database/users.txt");
        $data = explode("\n", $d);

        foreach ($data as $row => $data) {

            $row_user = explode(',', $data);
            $this->u = @(strtolower($row_user[1]));
            $this->p = @trim(strtolower($row_user[2]), "\r");

            if (strcmp($this->u, $this->username) === 0 && strcmp($this->p, $this->password) === 0) {
                return true;
            }
        }
        return false;
    }

    public function storeUser()
    {
        if (isset($_POST['save'])) {
            $getData = file_get_contents("../database/users.txt");
            $data = explode("\n", $getData);
            foreach ($data as $row => $data) {
                $row_user = explode(',', $data);
                $dataUsername =@(strtolower($row_user[1]));  
            }
            $id = uniqid();
            $name = $_POST['username'];
            $password = $_POST['password'];

            if ($name !== $dataUsername) {
            $arrdata = array($id,$name,$password);
            $fp = fopen('../database/users.txt', 'a+');
            $create = fputcsv($fp, $arrdata);
            fclose($fp);
            header("Location: ../admin/administration.php");
            }
            else {
                echo "<script type='text/javascript'>alert('same name');</script>";
            }
        }
    }
}
