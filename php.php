<!--

Zadania z funkcji wbudowanych - PHP
Każdy punkt to ocena wyżej

-->



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zadanie funkcje wbudowane</title>
</head>
<body>

<?php
//Wypisanie aktualnej daty w formacie dzień/miesiąc/rok np 01/06/1999r
echo "<p> Dzisiaj jest: " . date('d/m/y') . "</p>";

//Stworzenie tablicy z dowolnymi różnymi znakami i wygenerowanie losowego hasła z tych znaków.
$znaki = ['J'. 'A', 'N', '4', '%', "5", "3", "9", "*", "@", "&"];

function generujHaslo($dlugosc = 12){
    global $znaki;
    $haslo = '';
    $iloscZnakow = count($znaki);

    for($i = 0; $i < $dlugosc; $i++){
        $haslo .= $znaki[rand(0, $iloscZnakow - 1)];
    }

    return $haslo;
}

echo "<p> Wygenerowane haslo to: " . generujHaslo(5) . "</p>";

//Stworzenie logów tzn za każdym razem gdy strona zostanie odświeżona do pliku na dysku dopisuje się data
//  i godzina w formacie dzień-miesiąc-rok godziny:minuty

$sciezak_pliku = 'log.txt';
$data_godzina = date('d/m/Y H:i');
$wpis = "Odswiezenie strony: " . $data_godzina . "\n";
file_put_contents($sciezak_pliku, $wpis, FILE_APPEND);
echo "Log zapisany";

//Wczytać z pliku na dysku tekst i wypisać go w przeglądarce z podmienieniem znaków według zasady a->1, b->2...i->9, reszta znaków bez zmian.

$sciezka_pliku2 = 'plik.txt';
if(file_exists($sciezka_pliku2)){
    $tekst = file_get_contents($sciezka_pliku2);
    $tekst_zmiana = '';
    $zmiana = ['a' => '1', 'b' => '2', 'c' => '3', 'd' => '4', 'e' => '5', 'f' => '6', 'g' => '7', 'h' => '8', 'i' => '9'];
    for($i = 0; $i < strlen($tekst); $i++){
        $znak = $tekst[$i];
        if(isset($zmiana[$znak])){
            $tekst_zmiana .= $zmiana[$znak];
        }else{
            $tekst_zmiana .= $znak;
        }
    }
    echo "</br></br>" . nl2br($tekst_zmiana);
}else{
    echo "</br></br>Plik nie istnieje!";
};

//Stworzenie dwóch pól do wpisywania daty (input typu data) oraz przycisku po którego przyciśnięciu następuje wypisanie 
// ile dni dzieli podane daty oraz czy przynajmniej jedna z tych dat znajduje się w logach zapisanych na dysku, podczas 
// wyszukiwania interesuje nas jedynie data, nie czas


?>
    
</body>
</html>