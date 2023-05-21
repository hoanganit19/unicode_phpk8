<?php

namespace App\Models;

use Core\Model;

class Page extends Model
{
    protected $table = 'pages';

    public function getPages($filters)
    {
        $where = $this->buildWhere($filters);
        $sql = "SELECT * FROM $this->table $where ORDER BY created_at DESC";

        $pages = $this->paginate($sql, config('paginate.admin'));

        return $pages;
    }

    public function addPage($attributes)
    {
        return $this->create($this->table, $attributes);
    }

    public function getPage($field = 'id', $value)
    {
        $user = $this->first("SELECT * FROM $this->table WHERE $field = ?", [$value]);
        return $user;
    }

    public function updateById($attributes, $id)
    {
        $condition = "id = $id";
        return $this->update($this->table, $attributes, $condition);
    }

    public function deletePage($id)
    {
        return $this->remove($this->table, "id = $id");
    }

    public function deletePages($ids)
    {
        $condition = "id IN($ids)";
        return $this->remove($this->table, $condition);
    }


}
