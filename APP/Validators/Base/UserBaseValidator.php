<?php

namespace App\Validators\Base;

use App\Models\User;

class UserBaseValidator extends BaseValidator
{
    public function checkEmailOnExists(string $email): bool|User
    {
        if ($user = User::findBy('email', $email)) {
            $this->errors = [
                'email_error' => 'User with this email already exists'
            ];
            return $user;
        }

        return false;
    }
}