<?php

class Uczniowie {

    private $query;
    private $klucze;
    private $obj;

    public function __construct() {
        $this->query = DB::query("SELECT * FROM uczenn");
        $this->klucze = array("id", "imie", "nazwisko","mail","klasa","ustawienia");
        $this->obj = array();
    }

    public function pobierz() {
        for ($i = 0; $i < count($this->query); $i++) {
            $this->obj[$i] = array_combine($this->klucze, array(
                $this->query[$i]["Uid"],
                $this->query[$i]["imie"],
                iconv("ISO-8859-2", "UTF-8", $this->query[$i]["nazwisko"]),
                $this->query[$i]["mail"],
                $this->query[$i]["klasa"],
                $this->query[$i]["Uid"],
            ));
        }

        return $this->obj;
    }
    public function zwrocJson() {
        return json_encode($this->pobierz());
    }
}

class Komputery {

    private $query;
    private $klucze;
    private $obj;

    public function __construct() {
        $this->query = DB::query("SELECT * FROM komputery");
        $this->klucze = array("kid", "nazwa", "ip","mac");
        $this->obj = array();
    }

    public function pobierz() {
        for ($i = 0; $i < count($this->query); $i++) {
            $this->obj[$i] = array_combine($this->klucze, array(
                $this->query[$i]["kid"],
                $this->query[$i]["nazwa"],
                $this->query[$i]["ip"],
                $this->query[$i]["mac"],
            ));
        }

        return $this->obj;
    }
    public function zwrocJson() {
        return json_encode($this->pobierz());
    }
}

class Plan {

    private $query;
    private $klucze;
    private $obj;

    public function __construct() {
        $this->query = DB::query("SELECT * FROM plan");
        $this->klucze = array("Pid", "start", "koniec","dzien","lekcja");
        $this->obj = array();
    }

    public function pobierz() {
        for ($i = 0; $i < count($this->query); $i++) {
            $this->obj[$i] = array_combine($this->klucze, array(
                $this->query[$i]["Pid"],
                $this->query[$i]["start"],
                $this->query[$i]["koniec"],
                $this->query[$i]["dzien"],
                $this->query[$i]["lekcja"],
            ));
        }

        return $this->obj;
    }
    public function zwrocJson() {
        return json_encode($this->pobierz());
    }
}

class LogEntry
{
    public $czas;
    public $ip;
    public $domena;
    public $przegladarka;

    public function __construct($czas, $ip, $domena, $przegladarka)
    {
        $this->czas =  time();
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->domena = $_SERVER['HTTP_HOST'];
        $this->przegladarka = $_SERVER['HTTP_USER_AGENT'];
    }
    public function toJson()
    {
        return json_encode(array(
            $this->czas,
            $this->ip,
            $this->przegladarka,
        ));
    }
}


?>