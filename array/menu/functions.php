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