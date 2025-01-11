<?php
require("../Models/db_connect.php");
try {
    $id = $_GET["id"];

    deleteExpense($id);

    header('location:../index.php');
} catch (Throwable $th) {
    echo "Error: " . $th->getMessage();
}

?>
