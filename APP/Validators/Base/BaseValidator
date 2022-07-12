<?php

namespace App\Validators\Base;

use App\Models\User;

class BaseValidator
{
    protected array $errors = [];
    protected array $rules = [];

    public function validate(array $fields): bool
    {
        foreach ($fields as $key => $field) {
            if (preg_match($this->rules[$key], $field)) {
                unset($this->errors["{$key}_error"]);
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
