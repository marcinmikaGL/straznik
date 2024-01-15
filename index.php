<?php
class LogEntry
{
    public $id;
    public $czas;
    public $ip;
    public $domena;
    public $przegladarka;

    public function __construct($id, $czas, $ip, $domena, $przegladarka)
    {
        $this->id = $id;
        $this->czas = $czas;
        $this->ip = $ip;
        $this->domena = $domena;
        $this->przegladarka = $przegladarka;
    }
}

// Pobierz czas i adres IP
$czas = time();
$ip = $_SERVER['REMOTE_ADDR'];

// Pobierz domenę
$domena = $_SERVER['HTTP_HOST'];

// Pobierz przeglądarkę
$przegladarka = $_SERVER['HTTP_USER_AGENT'];

// Utwórz zmienną do przechowywania id wpisu
$id = 1;

// Otwórz plik JSON
$plik = fopen("log.json", "r+");

// Sprawdź, czy plik istnieje
if ($plik === false) {
    // Jeśli plik nie istnieje, utwórz go
    $plik = fopen("log.json", "w");

    // Utwórz pusty tablicę danych
    $dane = [];
} else {
    // Jeśli plik istnieje, odczytaj z niego dane
    $dane = json_decode(fread($plik, filesize("log.json")));

    // Jeśli plik nie jest pusty, pobierz ostatnie id wpisu
    if ($dane) {
        $id = $dane->id + 1;
    }
}

// Utwórz nowy wpis logowania
$entry = new LogEntry($id, $czas, $ip, $domena, $przegladarka);



// Zapisz dane do pliku JSON
$json = json_encode($entry, JSON_PRETTY_PRINT);
fwrite($plik, $json . "\n");

// Zamknij plik
fclose($plik);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Zso5 </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="text-center">Ruch zablokowany!</h1>
    <div>
	twoje IP:<strong style="color:red;"><?php echo $ip; ?></strong> <br>
	domena: <strong style="color:red;"><?php echo $domena; ?> </strong> <br>
	przeglądarka: <strong style="color:red;"> <?php echo $przegladarka; ?> </strong>
	</div>
  </div>
</body>
</html>
