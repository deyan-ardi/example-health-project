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
            $_SESSION['logged_in'] = date("jS M Y H:i");
            $_SESSION['user'] = true;

            $hour = time() + 3600 * 3;
            setcookie('status', true,$hour);
            if($_POST["remember"]=='1' || $_POST["remember"]=='on')
            {
                setcookie('username', $this->username, $hour);
                setcookie('password', $this->password, $hour);
                header("Location: administration.php?page=dashboard");
                die();
            }

            header("Location: administration.php?page=dashboard");
            die();

        } else {
            $id = uniqid();
            $name = $_POST['username'];
            $date = date("Y-m-d H:i:s");
            $arrdata = array($id, $name, $date);
            $fp = fopen('../database/accessattempts.txt', 'a+');
            $create = fputcsv($fp, $arrdata);
            fclose($fp);
            setcookie('username', $this->username, $hour);
            setcookie('password', $this->password, $hour);
            header("Location: ../admin/login.php");
            die;
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            session_start();
            setcookie("username","");
            setcookie("password","");
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
            $this->u = @trim(strtolower($row_user[1]),'"');
            $this->p = @trim(strtolower($row_user[2]), "\r");

            if (strcmp($this->u, $this->username) === 0 && strcmp($this->p, $this->password) === 0) {
                return true;
            }
            else if (strcmp($this->u, $this->username) !== 0 && strcmp($this->p, $this->password) !== 0) {
                $_SESSION['password_error'] ='<div class="text-danger">Or your password is wrong</div>';
                $_SESSION['username_error'] ='<div class="text-danger">Username not found</div>';
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
            foreach ($data as $row => $data) {
                $row_user = explode(',', $data);
                $dataUsername = strtolower($row_user[1]);
                if ($dataUsername == strtolower($_POST['username'])) {
                    $status = true;
                    break;
                }
            }
            if (empty($name = $_POST['username']) || empty($password = $_POST['password']) || empty($password = $_POST['confirm_password'])) {
                setcookie('username_input', $this->username, time() + 1800);
                setcookie('password_input', $this->password, time() + 1800);
                if (empty($name = $_POST['username'])){
                    $_SESSION['message'] ='<div style="color:red; padding-bottom: 5px;">Username cannot be empty</div>';
                }
                elseif (empty($password = $_POST['password'])){
                    $_SESSION['password_input'] ='<div style="color:red; padding-bottom: 5px;">Password cannot be empty</div>';
                }
                elseif (empty($password = $_POST['confirm_password'])){
                    $_SESSION['confirm_input'] ='<div style="color:red; padding-bottom: 5px;">Confirm Password cannot be empty</div>';
                }
                header("Location: administration.php?page=manage_admin");

            } else {
                if (!$status) {
                    setcookie('username_input', "");
                    setcookie('password_input', "");
                    if ($_POST["password"] === $_POST["confirm_password"]) {
                        $id = uniqid();
                        $name = $_POST['username'];
                        $password = $_POST['password'];
                        $date = date("Y-m-d H:i:s");
                        $arrdata = array($id, $name, $password, $date);
                        $fp = fopen('../database/users.txt', 'a+');
                        $create = fputcsv($fp, $arrdata);    
                        fclose($fp);
                        setcookie('new_data', $this->username, time() + 3600 * 24);
                        $_SESSION['success'] = '<div class="alert alert-success">Success, successfully input data into data record</div>';
                        header("Location: administration.php?page=manage_admin");
                    } else {
                        $_SESSION['confirm_input'] = '<div style="color:red; padding-bottom: 5px;">Password confirmation does not match</div>';
                        header("Location: administration.php?page=manage_admin");
                    }
                } else {
                    $name = $_POST['username'];
                    $_SESSION['message'] = '<div style="color:red; padding-bottom: 5px;">Oh snap! ' . $name . ' is already in the record data</div>';
                    header("Location: administration.php?page=manage_admin");
                }
            }
        }
    }
}
