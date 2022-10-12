<?php

namespace controller;

use services\generateIdPatientService;

require_once("../services/generateIdPatientService.php");

class Appointments
{
    public $first_name;
    public $last_name;
    public $date;
    public $time;
    public $reason;
    public $generateIdPatientService;
    public function __construct()
    {
        $this->first_name = @htmlentities(strtolower($_POST['first_name']));
        $this->last_name = @htmlentities(strtolower($_POST['last_name']));
        $this->date = @htmlentities(strtolower($_POST['date']));
        $this->time = $_POST['time'];
        $this->reason = @htmlentities(strtolower($_POST['reason']));
        $this->generateIdPatientService = new generateIdPatientService();
        $_SESSION['notification'] = '';
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $id_patient = $this->generateIdPatientService->logic($this->first_name, $this->last_name);
            $getData = file_get_contents("../database/appointments.txt");
            $data = explode("\n", $getData);
            foreach ($data as $row => $data) {
                if (!empty($data)) {
                    $row_user = explode(',', $data);
                    $dataIdPatient = $row_user[1];
                    if ($dataIdPatient == $id_patient) {
                        $id_patient = $this->generateIdPatientService->logic($this->first_name, $this->last_name);
                    }
                }
            }
            if (empty($this->first_name) || empty($this->last_name) || empty($this->date) || empty($this->time) || empty($this->reason)) {
                $hour = time() + 3600;
                setcookie('first_name', $this->first_name, $hour);
                setcookie('last_name', $this->last_name, $hour);
                setcookie('date', $this->date, $hour);
                setcookie('time', serialize($this->time), $hour);
                setcookie('reason', $this->reason, $hour);
                $_SESSION['notification'] = '<div style="color:red">Error : All fields cannot be empty</div>';
                header("Location: booking");
            } else {
                $count = count($this->time);
                $merge = array_merge($this->time);
                $implode = $count == 1 ? implode("", $merge) : implode(";", $merge);
                $date = date('Y-m-d H:i:s');
                $id = uniqid();

                $arrdata = array($id, $id_patient, ucWords($this->first_name), ucWords($this->last_name), $this->date, $implode, $this->reason, $date);
                $fp = fopen('../database/appointments.txt', 'a+');
                $create = fputcsv($fp, $arrdata);

                fclose($fp);
                setcookie('first_name', '');
                setcookie('last_name', '');
                setcookie('date', '');
                setcookie('time', '');
                setcookie('reason', '');
                $_SESSION['notification'] = '<div style="color:green">Success : successfully input data into data record</div>';
                header("Location: booking");
            }
        }
    }
}
