<?php

use Carbon\Carbon;

function showMsg($msg, $type='success')
{
    return $msg ? '<div class="alert alert-'.$type.' text-center">'.$msg.'</div>' : '';
}

function getDateFormat($date, $format = 'd/m/Y H:i:s')
{
    return !empty($date) ? Carbon::parse($date)->format($format) : null;
}

function getCategories($categories, $parentId = 0, $char = '', $old = '', $currentId = 0)
{
    if (!empty($categories)) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId) {
                $selected = $old == $category->id ? 'selected' : false;
                if (!empty($currentId)) {
                    if ($currentId != $category->id) {
                        echo '<option value="'.$category->id.'" '.$selected.'>'.$char.$category->name.'</option>';
                    }
                } else {
                    echo '<option value="'.$category->id.'" '.$selected.'>'.$char.$category->name.'</option>';
                }
                getCategories($categories, $category->id, $char.'|-', $old, $currentId);
                unset($categories[$key]); //Khử đệ quy
            }
        }
    }
}

function getCategoriesTable($categories, $parentId = 0, $char = '')
{
    if (!empty($categories)) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId) {

                echo '<tr>
                <td>
                    <input type="checkbox" class="check-item" value="'.$category->id.'" />
                </td>
                <td>
                    '.$char.$category->name.'
                </td>
    
                <td>
                    <a class="badge bg-success text-white" href="'.route('categories', ['slug' => $category->slug]).'"
                        target="_blank">Link</a>
                </td>
                <td>
                    '.getDateFormat($category->created_at).'
                </td>
                <td>
                    <a href="'.route('admin.categories.edit', ['id' => $category->id]).'"
                        class="btn btn-warning btn-sm">Sửa</a>
                    <a href="'.route('admin.categories.delete', ['id' => $category->id]).'"
                        class="btn btn-danger btn-sm delete-action">Xóa</a>
                </td>
            </tr>';

                getCategoriesTable($categories, $category->id, $char.'|-');
                unset($categories[$key]); //Khử đệ quy
            }
        }
    }
}
