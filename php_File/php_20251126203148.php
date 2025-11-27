<?php

$url = "file:///C:/xampp/htdocs/php_File/index.html";
$html = file_get_contents($url);

echo $html;

libxml_use_internal_errors(true);
$dom = new DOMDocument;
$dom-> loadHTML($html);
libxml_clear_errors();
//print_r ($dom);

$xPath = new DOMXPath($dom);
$value = $xPath-> query('//nav//a');
$h1 = $value->item(0);
echo $h1->textContent;




?>
