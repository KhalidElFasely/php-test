<?php
require_once("db_connect.php");
try {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $note = $_POST["note"];
    $date = $_POST["date"];

    $req= "insert into expense (price, title, note, date) values ('$price', '$title', '$note' , '$date')";
    $cn->exec($req);
    header('location:index.php');
} catch (Throwable $th) {
    echo "Error: " . $th->getMessage();
}

?>
