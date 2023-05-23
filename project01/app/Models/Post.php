<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function getPosts($filters)
    {
        $where = $this->buildWhere($filters);
        $sql = "SELECT *, c.name as category_name, c.slug as slug_category FROM $this->table as p INNER JOIN categories as c ON  p.category_id=c.id $where ORDER BY p.created_at DESC";

        return $this->paginate($sql, config('paginate.admin'));
    }

    public function addPost($attributes)
    {
        return $this->create($this->table, $attributes);
    }

    public function getPost($field = 'id', $value)
    {
        $user = $this->first("SELECT * FROM $this->table WHERE $field = ?", [$value]);
        return $user;
    }

    public function updateById($attributes, $id)
    {
        $condition = "id = $id";
        return $this->update($this->table, $attributes, $condition);
    }

    public function deletePost($id)
    {
        return $this->remove($this->table, "id = $id");
    }

    public function deletePosts($ids)
    {
        $condition = "id IN($ids)";
        return $this->remove($this->table, $condition);
    }


}
