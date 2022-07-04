<?php

namespace App\Controllers;

use App\Helpers\SessionHelper;
use App\Validators\AuthValidator;
use Core\Controller;
use Core\View;

class AuthController extends Controller
{
    public function login()
    {
        if (SessionHelper::isUserLoggedIn()) {
            redirect();
        }
        View::render('auth/login');
    }

    public function register()
    {
        if (SessionHelper::isUserLoggedIn()) {
            redirect();
        }
        View::render('auth/register');
    }

    public function logout()
    {
        if (!SessionHelper::isUserLoggedIn()) {
            SessionHelper::destroy();
        }
        redirect();
    }

    public function verify()
    {
        $fields = filter_input_array(INPUT_POST, $_POST, 1);
        $validator = new AuthValidator();

        if ($validator->validate($fields) && $user = $validator->checkEmailOnExists($fields['email'])) {
            if ($validator->verifyPassword($fields['password'], $user->password)) {
                SessionHelper::setUserData($user->id);
                redirect();
            }
        }
        $this->data['data'] = $fields;
        $this->data += $validator->getErrors();

        View::render('auth/register', $this->data);
    }
}
