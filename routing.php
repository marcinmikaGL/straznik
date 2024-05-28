<?php
$Rurl = explode('/',$_SERVER['REQUEST_URI']);

if($Rurl[2] == "API") {
    header('Content-Type: application/json');

    if($Rurl[3] == "USERS") {
        $uczniowie = new Uczniowie();  
        echo $uczniowie->zwrocJson();
    }

    if($Rurl[3] == "USER") {
        $Uid = $Rurl[3];
        $uczniowie = new Uczniowie();  
        echo $uczniowie->zwrocJson();
    }

    if($Rurl[3] == "CLASS") {
        $uczniowie = new Uczniowie();  
        echo $uczniowie->zwrocJson();
    }

    if($Rurl[3] == "CLAS") {
        $Cid = $Rurl[3];
        $uczniowie = new Uczniowie();  
        echo $uczniowie->zwrocJson();
    }

    if($Rurl[3] == "PCS") {
        $Komputery = new Komputery();  
        echo $Komputery->zwrocJson();
    }

    if($Rurl[3] == "PC") {
        $Uid = $Rurl[4];
        $uczniowie = new Uczniowie();  
        echo $uczniowie->zwrocJson();
    }

    if($Rurl[3] == "PLANS") {
        $Plan = new Plan();  
        echo $Plan->zwrocJson();
    }

    if($Rurl[3] == "PLAN") 
    {
        $Uid = $Rurl[4];
        $uczniowie = new Uczniowie();  
        echo $uczniowie->zwrocJson();
    }

} else {
    include('page.php');
}
?>