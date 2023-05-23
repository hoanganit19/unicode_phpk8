<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getCategories($filters)
    {

        $where = $this->buildWhere($filters);

        $sql = "SELECT * FROM $this->table $where ORDER BY created_at DESC";

        return $this->paginate($sql, config('paginate.admin'));
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM $this->table ORDER BY name DESC";
        return $this->get($sql);
    }

    public function addCategory($attributes)
    {
        return $this->create($this->table, $attributes);
    }

    public function getCategory($field = 'id', $value)
    {
        $user = $this->first("SELECT * FROM $this->table WHERE $field = ?", [$value]);
        return $user;
    }

    public function updateById($attributes, $id)
    {
        $condition = "id = $id";
        return $this->update($this->table, $attributes, $condition);
    }

    public function deleteCategory($id)
    {
        return $this->remove($this->table, "id = $id");
    }

    public function deleteCatgories($ids)
    {
        $condition = "id IN($ids)";
        return $this->remove($this->table, $condition);
    }

    public function getChildren($id)
    {
        $sql = "SELECT id FROM $this->table WHERE parent_id = ?";
        return $this->count($sql, [$id]);
    }

}
