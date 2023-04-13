<?php
$json = @json_decode(file_get_contents('https://api.open-meteo.com/v1/forecast?latitude=57.78&longitude=26.01&hourly=temperature_2m,snowfall,cloudcover,windspeed_10m&start_date=2023-03-09&end_date=2023-03-09'), true);
$Temperatūra = $json["hourly"]["temperature_2m"];
asort($Temperatūra);

$i = 1;
foreach($Temperatūra as $key => $value) {
    if($i == 1){
        echo "Zemākā temperatūra šodien bija: " . $value . "°C" . " un tā bija pulkstens: " . $key . ":00";
    } else if($i == count($Temperatūra)) {
        echo "<br>Augstākā temperatūra šodiem bija: " . $value . "°C" . " un tā bija pulkstens: " . $key . ":00";
    }
    $i++;
}

echo "<br><br>";

$Mākoņainība = $json["hourly"]["cloudcover"];
asort($Mākoņainība);

$i = 1;
foreach($Mākoņainība as $key => $value) {
    if($i == 1){
        echo "Vismazāk mākoņi šodien bija: " . $value . "%" . " un tā bija pulkstens: " . $key . ":00";
    } else if($i == count($Mākoņainība)) {
        echo "<br>Viss vairāk mākoņi šodien bija: " . $value . "%" . " un tā bija pulkstens: " . $key . ":00";
    }
    $i++;
}

echo "<br><br>";

$Vējainība = $json["hourly"]["windspeed_10m"];
asort($Vējainība);

$i = 1;
foreach($Vējainība as $key => $value) {
    if($i == 1){
        echo "Viss vājākais vējš bija: " . $value . "km/h" . " un tā bija pulkstens: " . $key . ":00";
    } else if($i == count($Vējainība)) {
        echo "<br>Visstiprākais vējš bija: " . $value . "km/h" . " un tā bija pulkstens: " . $key . ":00";
    }
    $i++;
}

echo "<br><br>";

$Sniegainība = $json["hourly"]["snowfall"];
asort($Sniegainība);

$i = 1;
foreach($Sniegainība as $key => $value) {
    if($i == count($Sniegainība)) {
        if($value == 0) {
        echo "Šodien nesnigs: ";
        } else {
            echo "Snigs pulkstens: " . $key . ":00";
        }
    }
    $i++;
}
?>
