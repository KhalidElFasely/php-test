<?php
require_once("../Models/db_connect.php");
try {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $note = $_POST["note"];
    $date = $_POST["date"];
    
    addExpense($title, $price, $note, $date);

    header('location:../index.php');
} catch (Throwable $th) {
    echo "Error: " . $th->getMessage();
}

?>
