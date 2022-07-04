<?php

namespace App\Validators;

use App\Validators\Base\UserBaseValidator;

class AuthValidator extends UserBaseValidator
{
    protected array $errors = [
        'email_error' => 'Email or password is invalid',
        'password_error' => 'Email or password is invalid'
    ];

    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/'
    ];

    public function verifyPassword($formPass, $userPass): bool
    {
        $result = true;
        if (!password_verify($formPass, $userPass)) {
            $this->errors['password_error'] = 'Email or password is invalid';
            $result = false;
        }
        return $result;
    }
}
