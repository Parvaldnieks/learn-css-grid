<?php
$json = @json_decode( file_get_contents('https://ej.uz/vtdt-php-json1'), true);
$search = !empty($_POST["search"]) ? strtolower( trim($_POST["search"])) : "";
echo "Mekle: " . $search;
//Ielade JSON sarakstu


foreach($json as $key => $studenta) {
    /*
    //parbauda katra studentu
    //Vārdu
    //$nameList = explode(' ', strtolower(trim($studenta['Vārds'])));                 
    //valsti
    $countryList = str_replace(
        [",\n", ",", " "],
        "\n",
        $studenta['Ceļojumi']
    );
    $piemers = "ASV, Anglija, \nPolija Čehija"; // => "ASV\n\nAnglija\nPolija\nČehija"
    $countryList = explode("\n, strtolower(trim($countryList")));
    */
    if(stripos(trim($studenta['Vārds']), $search) !== false
    || stripos(trim($studenta['Ceļojumi']), $search) !== false) {
        echo "<br><br>" . implode(", ", $studenta);
        //$found[$key] =implode(", ", $studenta);
    }
}

?>
