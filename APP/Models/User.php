<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
    protected static string|null $tableName = "users";

    public function fullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }

}
