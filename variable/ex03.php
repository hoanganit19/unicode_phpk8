<?php 
$a = 'Hoàng an';
$b = 'Unicode';
$c = $a.' - '.$b;
echo $c;

$courseName = 'PHP Laravel';

//$welcome = "<p>Xin chào, đây là khóa học {$courseName}tại Unicode Academy</p>";

$welcome = "<p>Xin chào, đây là khóa học ".$courseName."tại Unicode Academy</p>";

echo $welcome;

echo '<br/>';

$title = 'Khóa học Laravel';
$link = '#';

$html = '<h1><a href="'.$link.'" onclick="alert(\'Unicode\')">'.$title.'</a></h1>';

echo $html;