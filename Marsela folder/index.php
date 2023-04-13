<?php

$name = ""; 
if (!empty($_POST["vards"])){
    $name = strtolower(trim($_POST["vards"]));
}
$country = "";
if (!empty($_POST["vards"])){
    $country = strtolower(trim($_POST["vards"]));
}
$liveplace = "";
if (!empty($_POST["vards"])){
    $liveplace = strtolower(trim($_POST["vards"]));
}
$group = "";
if (!empty($_POST["vards"])){
    $group = strtolower(trim($_POST["vards"]));
}
$language = "";
if (!empty($_POST["vards"])){
    $language = strtolower(trim($_POST["vards"]));
}

if (strlen($name)>0 ){
    echo "Mekleja<br>Searched: ".$name."<br>"."--------------------<br>";
    $data = @json_decode(file_get_contents("https://ej.uz/vtdt-php-json1"),true);

foreach($data as $key => $value){
    $found = false;
    $vards = explode(" ", strtolower(trim($value["Vārds"])));
    $uzvards = explode(" ", strtolower(trim($value["Uzvārds"])));
    if(isset($_POST["check"])){
        if(in_array('vārds', $_POST['check'])){
            if(in_array($name,$vards))   {
            
                $found = true;
                                                         }
        }
    }
    if(isset($_POST["check"])){
        if(in_array('uzvārds', $_POST['check'])){
            if(in_array($name,$uzvards))    {
            
        $found = true;
                                                 } 
                                            }
    }                           
    $fixedCountry = str_replace([",\n", ",", " "], "\n",$value["Ceļojumi"]);                  
    $valsts = explode("\n", strtolower(trim($fixedCountry)));
    if(isset($_POST["check"])){
        if(in_array('ceļojumi', $_POST['check'])){
    if(in_array($country,$valsts)) {
        $found = true;
        
                                }
                            }
                        }
    $dzivesvietas = explode(" ", strtolower(trim($value["Dzīvesvieta"])));
    if(isset($_POST["check"])){
        if(in_array('dzīvesvieta', $_POST['check'])){
    if(in_array($liveplace,$dzivesvietas)) {
        $found = true;
                                        }
                                    }
    }   
    $grupas = explode(" ", strtolower(trim($value["Grupa"])));
    if(isset($_POST["check"])){
        if(in_array('grupa', $_POST['check'])){
    if(in_array($group,$grupas)) {
        $found = true;
                                        }  
                                    }
                                }   
    $fixedLang = str_replace([",\n", ",", " "], "\n",$value["Valodas"]);                                     
    $valoda = explode("\n", strtolower(trim($fixedLang)));
    if(isset($_POST["check"])){
        if(in_array('valodas', $_POST['check'])){
    if(in_array($language,$valoda)) {
        $found = true;
                                        }    
                                    }
                                }
    else{
        if(in_array($name,$vards))   {
            
            $found = true;
                                                     }
        if(in_array($name,$uzvards))    {
                
            $found = true;
                                                     }                                         
        $fixedCountry = str_replace([",\n", ",", " "], "\n",$value["Ceļojumi"]);                  
         $valsts = explode("\n", strtolower(trim($fixedCountry)));
        if(in_array($country,$valsts)) {
            $found = true;
            
                                    }
        $dzivesvietas = explode(" ", strtolower(trim($value["Dzīvesvieta"])));
        if(in_array($liveplace,$dzivesvietas)) {
            $found = true;
                                            }
        $grupas = explode(" ", strtolower(trim($value["Grupa"])));
        if(in_array($group,$grupas)) {
            $found = true;
                                            } 
        $fixedLang = str_replace([",\n", ",", " "], "\n",$value["Valodas"]);                                     
        $valoda = explode("\n", strtolower(trim($fixedLang)));
        if(in_array($language,$valoda)) {
            $found = true;
                                            }        
    }                                                            
        if ($found == true){

            $celojumi = $value["Ceļojumi"];
            $valodas = $value["Valodas"];
            $grupa = $value["Grupa"];
            $dzivesvieta = $value["Dzīvesvieta"];
            $bd = $value["Dzimšanasdiena"];
            echo "Vards:".$value["Vārds"]."<br>"."Uzvards:".$value["Uzvārds"]."<br>";
            echo "Dzimsanas diena: ".$bd."<br>";
            echo "Dzivesvieta: ".$dzivesvieta."<br>";
            echo "Grupa: ".$grupa."<br>";
            echo "Ceļojumi: ".$celojumi."<br>";
            echo "Valodas: ".$valodas."<br>";
            echo "---------------------"."<br>";
                             }
        else {
            echo "";
            }         
        }  
    }  


   

    

?>