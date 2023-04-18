<?php

namespace Core;

class View
{
    public static function render($path, $data = [])
    {
        extract($data);

        $contentView = self::getView($path);

        $contentView = preg_replace('~{{\s*(.+?)\s*}}~s', '<?php echo htmlentities($1); ?>', $contentView);

        $contentView = preg_replace('~{!!\s*(.+?)\s*!!}~s', '<?php echo $1; ?>', $contentView);

        $contentView = preg_replace('~@foreach\s*(\(.+?\))~s', '<?php foreach $1: ?>', $contentView);

        $contentView = preg_replace('~@endforeach~s', '<?php endforeach;  ?>', $contentView);

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
