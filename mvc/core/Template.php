<?php

namespace Core;

class Template
{
    public static function run($contentView)
    {

        preg_match("~@extends\('(.+?)'\)~s", $contentView, $matches);

        if (!empty($matches[1])) {
            $layoutContent = self::getLayout($matches[1]);
            $contentView = preg_replace("~@extends\('(.+?)'\)~s", $layoutContent, $contentView);

            preg_match_all("~@yield\('(.+?)'\)~s", $contentView, $matches);

            if (!empty($matches[1])) {
                $yieldNameArr = $matches[1];
                foreach ($yieldNameArr as $yieldName) {
                    preg_match("~@section\('".$yieldName."'\)(.+?)@endsection~s", $contentView, $matchesSection);

                    $sectionContent = null;
                    if (!empty($matchesSection[1])) {
                        $sectionContent = $matchesSection[1];
                        $contentView = preg_replace("~@section\('".$yieldName."'\)(.+?)@endsection~s", "", $contentView);
                    }

                    $contentView = str_replace("@yield('".$yieldName."')", $sectionContent, $contentView);
                }
            }

        }

        $contentView = preg_replace('~{{\s*(.+?)\s*}}~s', '<?php echo htmlentities($1); ?>', $contentView);

        $contentView = preg_replace('~{!!\s*(.+?)\s*!!}~s', '<?php echo $1; ?>', $contentView);

        $contentView = preg_replace('~@foreach\s*(\(.+?\))~s', '<?php foreach $1: ?>', $contentView);

        $contentView = preg_replace('~@endforeach~s', '<?php endforeach;  ?>', $contentView);


        return $contentView;
    }

public static function getLayout($path)
{
    $pathLayout = BASE_ROOT.'/app/Views/'.$path.'.php';
    $layoutContent = file_get_contents($pathLayout);
    return $layoutContent;
}
}
