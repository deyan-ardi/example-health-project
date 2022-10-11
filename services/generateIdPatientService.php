<?php

namespace services;

class generateIdPatientService
{
    public function logic(string $first_name, string $last_name)
    {
        $first_name_first_word = substr($first_name, 0, 1);
        $last_name_first_word = substr($last_name, 0, 1);
        $randomNumber = $this->randomNumber();
        $countRandomNumber = array_sum($randomNumber);
        $modulusCountRandomNumber = $countRandomNumber % 26;
        $lastLetter = $this->letterFromNumber($modulusCountRandomNumber);
        $patientId = strtoupper($first_name_first_word) . strtoupper($last_name_first_word) . implode("", $randomNumber) . $lastLetter;
        return $patientId;
    }

    public function randomNumber()
    {
        $digit = rand(1, 6);
        $randomNumber = [];
        for ($i = 1; $i <= $digit; $i++) {
            array_push($randomNumber, rand(1, 9));
        }
        $countRandomNumber = array_sum($randomNumber);
        if ($countRandomNumber <= 0 || $countRandomNumber > 26) {
            return $this->randomNumber();
        } else {
            return $randomNumber;
        }
    }

    public function letterFromNumber(string $number)
    {
        $arr_letter = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        return $arr_letter[$number - 1];
    }
}
