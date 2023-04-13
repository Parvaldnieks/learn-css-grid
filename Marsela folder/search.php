<?php             ////var_dump($_POST);

$json = @json_decode(file_get_contents('https://ej.uz/vtdt-php-json1'), true);

$search = !empty($_POST["search"]) ? strtolower( trim($_POST["search"])) : "";

if(!empty($search)) {

    foreach($json as $students) {
        $nameList = explode(' ', strtolower(trim($students['Vārds'])));
        $surnameList = explode(' ',strtolower(trim($students['Uzvārds'])));

        $LanguageList = explode(' ',strtolower(trim($students['Valodas'])));

        $cntrList = str_replace(
            [",\n", ",", " "],
            "\n",
            $students['Ceļojumi']
        );
        $cntrList = explode("\n", strtolower(trim($cntrList)));
        
        if(in_array($search, $nameList) || in_array($search, $surnameList) || in_array($search, $cntrList) || in_array($search, $LanguageList)){

            echo "<p>" . $students["Vārds"] . "</p>";
            echo "<p>" . $students["Uzvārds"] . "</p>";
            echo "<p>" . $students["Grupa"] . "</p>";
            echo "<p>" . $students["Dzimšanasdiena"] . "</p>";
            echo "<p>" . $students["Dzīvesvieta"] . "</p>";
            echo "<p>" . $students["Ceļojumi"] . "</p>";
            echo "<p>" . $students["Valodas"] . "</p>";
        }
    }
}else {
    echo "Nav ko meklet!";
}
?>