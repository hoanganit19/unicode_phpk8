<?php

namespace Core;

use Core\Template;

class View
{
    public static function render($path, $data = [])
    {
        extract($data);

        $contentView = self::getView($path);

        $contentView = Template::run($contentView);

        eval('?> '.$contentView.' <?php');
    }

    //Chia sẻ dữ liệu tới tất cả các view
    public static function share()
    {

    }

    private static function getView($path)
    {
        $path = BASE_ROOT.'/app/Views/'.$path.'.php';
        return file_get_contents($path);
    }
}