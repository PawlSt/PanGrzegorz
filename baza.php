<?php 
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = @mysqli_connect("localhost","root","", "pstochel");
    if(!$conn) die('Sprawdź polączenie z mysql-em');
    if(isset($_GET['akcja']))
    $przycisk='dodaj';
    $nazwisko="";
    $imie="";
    $id="";
        switch($_GET['akcja']){
            case 'dodaj':
                if(isset($_GET["imie"],$_GET["nazwisko"])) {
                    $imie = $_GET["imie"];
                    $nazwisko = $_GET["nazwisko"];
                    if($imie != "" && $nazwisko != ""){
                    $conn->query("INSERT INTO pracownicy_4ic(imie,nazwisko) VALUES('$imie','$nazwisko')") or die("INSERT nie działa");
                    };
                    $imie='';
                    $nazwisko='';
                    $id='';
                }
                break;
            case 'usuń':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $conn->query("DELETE FROM pracownicy_4ic WHERE id_pracownika=$id") or die("Usuwanie nie działa");
                }
                break;
            case 'edytuj':
                $id=$_GET['id'];
                $rs = $conn->query("SELECT imie,nazwisko FROM pracownicy_4ic WHERE id_pracownika=$id") or die('SELECT nie działa');
                $row = $rs->fetch_array();
                $imie=$row['imie'];
                $nazwisko=$row['nazwisko'];
                $przycisk='zapisz';
                break;
                case 'zapisz':
                    $id = $_GET['id'];
                    $imie = $_GET["imie"];
                    $nazwisko = $_GET["nazwisko"];
                    $sql="UPDATE pracownicy_4ic SET imie = '$imie', nazwisko = '$nazwisko' WHERE ID_pracownika=$id";
                    $conn->query($sql) or die('Błąd aktualizacji');
                    $imie='';
                    $nazwisko='';
                    $id='';
                    break;
        }

    $result =$conn->query("SELECT id_pracownika id,imie,nazwisko FROM pracownicy_4ic") or die('SELECT nie działa');
    if($result->num_rows>0) {
        echo "<table border=1><tr><th>Imię</th><th>Nazwisko</th>
        <th>Usuwanie</th><th>Edycja</th>
        </tr>";
    } else {
        echo "Brak danych o pracownikach";
    }
    
    while($row = $result ->fetch_array()) {
        // echo "<tr><td>", $row["imie"], "</td><td>", $row["Nazwisko"],"</td></tr>";

        echo '<form><tr><th><input type="hidden" name="id" value="',$row['id'],'">', $row['imie'], '</th><th>' ,$row['nazwisko'],'</th><th><input type="submit" name="akcja" value="usuń"></th><th><input type="submit" name = "akcja" value="edytuj"></th></tr></form>';
    };
    $result->close();
    $conn->close();

echo
"<form>
    <input type='hidden' name='id' value='",$id,"'>
    Imię: <input type='text' name='imie' value='",$imie,"'></br>
    Nazwisko: <input type='text' name='nazwisko' value='",$nazwisko,"'></br>
    <input type='submit' name='akcja' value='$przycisk'>
</form>";
?>