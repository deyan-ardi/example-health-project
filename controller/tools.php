<?php
// defined('BASEPATH') or exit('No direct script access allowed');
class Tools
{
    public $username;
    public $password;
    public $u;
    public $p;
    public $data;
    public $message;

    public function __construct()
    {
        $this->username = @htmlentities(strtolower($_POST['username']));
        $this->password = @htmlentities(strtolower($_POST['password']));
        $_SESSION['message'] = '';
    }

    public function login()
    {
        if ($this->verify()) {
            $_SESSION['username'] = $this->username;
            $_SESSION['password'] = $this->password;
            $_SESSION['user'] = true;
            header("Location: administration?page=dashboard");
            die();
        } else {
            $id = uniqid();
            $name = $_POST['username'];
            $date = date("l, F d Y");
            $arrdata = array($id,$name,$date);
            $fp = fopen('../database/accessattempts.txt', 'a+');
            $create = fputcsv($fp, $arrdata);
            fclose($fp);
            $_SESSION['message'] = '<div class="alert alert-danger">Login failed, check your input</div>';
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
            $status = false;
            foreach($data as $row => $data){
                $row_user = explode(',', $data);
                $dataUsername = strtolower($row_user[1]);
                if($dataUsername == strtolower($_POST['username'])){
                    $status = true;
                    break;
                }
            }
            if (empty($name = $_POST['username']) || empty($password = $_POST['password']) || empty($password = $_POST['confirm_password'])) {
                $_SESSION['message'] = '<div class="alert alert-danger">All fields cannot be empty</div>';
                header("Location: administration?page=manage_admin");
            } 
            else{
            if(!$status){
                if ($_POST["password"] === $_POST["confirm_password"]) {
                    $id = uniqid();
                    $name = $_POST['username'];
                    $password = $_POST['password'];
                    $date = date("l, jS F Y");
                    $arrdata = array($id,ucfirst($name),$password,$date);
                    $fp = fopen('../database/users.txt', 'a+');
                    $create = fputcsv($fp, $arrdata);
                    fclose($fp);
                    $_SESSION['message'] = '<div class="alert alert-success">Success, successfully input data into data record</div>';
                    header("Location: administration?page=manage_admin");
                 }
                 else {
                    $_SESSION['message'] = '<div class="alert alert-danger">Failed, the password confirmation does not match</div>';
                    header("Location: administration?page=manage_admin");
                 }
            }
            else {
                $name = $_POST['username'];
                $_SESSION['message'] = '<div class="alert alert-danger">Oh snap! '.$name.' is already in the record data</div>';
                header("Location: administration?page=manage_admin");
            }
        }
    }
    }

}
