<?php

// Local HTML file path
$html = file_get_contents("https://www.cricbuzz.com/"); // তোমার file path ঠিক করো

// DOMDocument setup
libxml_use_internal_errors(true);
$dom = new DOMDocument;
$dom->loadHTML($html);
libxml_clear_errors();

// DOMXPath setup
$xpath = new DOMXPath($dom);

// সব <a> tag select করা
//$links = $xpath->query('//a');
//$links = $xpath->query('//section[contains('@id,"profile")]//h2);
$links = $xpath->query('//div[contains(@class,"shadow rounded-md overflow-hidden")]//div');


foreach($links as $link){
    echo "Text: " . trim($link->textContent) . "<br>";
    echo "Href: " . $link->getAttribute('href') . "<br><br>";
}

?>
