<?php

function buildMenus($menus, $parentId=0)
{
    if (!empty($menus)) {
        echo '<ul>';
        foreach ($menus as $key => $menu) {
            if ($menu['parent'] == $parentId) {
                echo '<li><a href="'.$menu['link'].'">'.$menu['title'].'</a>';
                unset($menus[$key]);
                buildMenus($menus, $menu['id']);
                echo '</li>';
            }
        }
        echo '</ul>';
    }
}

function buildMenus2($menus)
{
    if (!empty($menus)) {
        echo '<ul>';
        foreach ($menus as $key => $menu) {
            echo '<li><a href="'.$menu['link'].'">'.$menu['title'].'</a>';
            if (!empty($menu['children'])) {
                buildMenus2($menu['children']);
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}

//Hàm này có return
function buildNested($menus, $parent=0, &$result=[])
{
    if (!empty($menus)) {
        foreach ($menus as $key => $menu) {
            if ($menu["parent"] == $parent) {
                $result[$key] = $menu;

                if (!empty($result[$key])) {
                    buildNested($menus, $menu['id'], $result[$key]['children']);
                    $result = array_values($result); //reset index
                }
            }
        }
    }

    return $result;
}

function buildBreadcrums($categories, $id, &$result=[], $check = false)
{
    if (!empty($categories)) {
        //Chuyển từ id => parent của chuyên mục hiện tại

        foreach ($categories as $category) {
            if ($category['id'] == $id) {
                $parent = $category['parent'];
                if (!$check) {
                    $result[] = $category; //Thêm chuyên mục hiện tại
                }

                break;
            }
        }

        //Tìm cha dựa vào parent đã tìm ở bước trên
        if (!empty($parent)) {
            foreach ($categories as $category) {
                if ($parent == $category['id']) {
                    array_unshift($result, $category); //Insert đảo ngược mảng
                    buildBreadcrums($categories, $category['id'], $result, true);
                }
            }
        }
    }

    return $result;
}
