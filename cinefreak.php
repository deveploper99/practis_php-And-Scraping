<?php

$url = "https://www.cinefreak.net/";  // যেকোনো site

$curl = curl_init($url);

curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64)"
]);

$html = curl_exec($curl);
curl_close($curl);

echo $html; // Check if you got full HTML

// Now DOM parse
libxml_use_internal_errors(true);

$dom = new DOMDocument;
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

// Example: All movie titles
$titles = $xpath->query("//h2");

foreach ($titles as $t) {
    echo trim($t->textContent) . "<br>";
}

?>
