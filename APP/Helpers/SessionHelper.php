<?php

namespace App\Helpers;

use App\Validators\UserCreateValidator;

class SessionHelper
{

    public static function isUserLoggedIn(): bool
    {
        return !empty($_SESSION['user_data']);
    }

    public static function userId()
    {
        return $_SESSION['user_data']['id'];
    }

    public static function setUserData($id, ...$args)
    {
        $_SESSION['user_data'] = array_merge([
            'id' => $id
        ], $args);
    }

    public static function destroy()
    {
        $fields = filter_input_array(INPUT_POST, $_POST, 1);
        $validator = new UserCreateValidator();
        session_destroy();
    }
}
