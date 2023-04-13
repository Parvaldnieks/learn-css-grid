<?php
$fileName ="data1.thx";
echo "Pirms izmainam: " . file_get_contents($fileName);
echo "<br>";


$data = "Marsels" . rand(1000, 9999) . "\n";
file_put_contents($fileName, $data, FILE_APPEND);

$content = file_get_contents($fileName);
$content = str_replace("\n", "<br>", $content);
echo "Pec izmainam: " . $content;

echo "<br>";
?>