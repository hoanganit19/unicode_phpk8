<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';

    public function getUserByEmail($email)
    {
        $user = $this->first("SELECT * FROM $this->table WHERE email=?", [$email]);

        return $user;
    }
}
