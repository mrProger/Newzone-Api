<?php

namespace App\Http\Controllers;

class ControllerLogic {
    public static function isNull(array $fields) {
        foreach ($fields as $field) {
            if ($field === null || trim($field) == '') {
                return true;
            }
        }

        return false;
    }

    public static function isCorrectPassword($userPassword, $verifiablePassword) {
        return $userPassword == md5($verifiablePassword);
    }
}
