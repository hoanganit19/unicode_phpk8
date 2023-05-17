<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';

    public function getUsers($filters)
    {
        $where = $this->buildWhere($filters);
        $sql = "SELECT * FROM users $where ORDER BY created_at DESC";

        $users = $this->paginate($sql, config('paginate.admin'));

        return $users;
    }

    public function addUser($attributes)
    {
        return $this->create($this->table, $attributes);
    }

    public function getUserByEmail($email)
    {
        $user = $this->first("SELECT * FROM $this->table WHERE email=?", [$email]);

        return $user;
    }

    public function updateById($attributes, $id)
    {
        $condition = "id = $id";
        return $this->update($this->table, $attributes, $condition);
    }

    public function getUser($field = 'id', $value)
    {
        $user = $this->first("SELECT * FROM $this->table WHERE $field = ?", [$value]);
        return $user;
    }

    public function deleteUser($id)
    {
        return $this->remove($this->table, "id = $id");
    }

    public function deleteUsers($ids)
    {
        $condition = "id IN($ids)";
        return $this->remove($this->table, $condition);
    }

}
