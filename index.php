<?php
// $liczba=18;
// if($liczba%2 === 0)
//     echo 'liczba ', $liczba, ' jest parzysta';
// else
//     echo 'liczba ', $liczba, ' jest nieparzysta';
// echo 'liczba ', $liczba, ' jest', ($liczba%2 === 0)? ' parzysta': ' nieparzysta';
// if(isset($_GET['liczba1'],$_GET['liczba2'],$_GET['operator']){
//     $l1 = $_GET['liczba1'];
//     $l2 = $_GET['liczba2'];
//     switch($_GET['operator'])
// })
// for($i=1;$i<11;$i++)
// {
//     $tab[$i]=rand(1,100);
//     echo $tab[$i],' ';
// }
// echo '<br>posortowane<br>';
// sort($tab);
// for($i=0; $i<10; $i++){
//     echo $tab[$i],' ';
// }

// echo "<br/>";
// echo "<br/>";

// foreach ($tab as $num){
//     if($num < 50){
//     continue;
//     }
//     echo $num,'<br/>';
// }

// echo "<br/>";
// echo "<br/>";

// function xde($a, $b){
// return $a * $b;
// }

// $bok1 = 6;
// $bok2 = 5;
// $b =5;
// $a = 5;
// echo xde($bok1, $bok2);
// echo "<br/>";
// echo $a;
// echo "<br/>";
// echo "<br/>";
// function silnia($n){
//     return($n > 1)?$n * silnia($n - 1) : 1;
// };
// echo silnia(20);

// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
if(isset($_GET['imie'],$_GET['nazwisko'])){
    $imie = trim($_GET['imie']);
    $nazwisko = trim($_GET['nazwisko']);
    echo $imie[0].$nazwisko[0];
    echo substr($imie,-1,1== 'a')?'kobieta':'mezczyzna';
}
?>

