<?php
require("db_connect.php");
try {
    $id = $_GET["id"];

    $req= "delete from expense where id=$id";
    $cn->exec($req);
    header('location:index.php');
} catch (Throwable $th) {
    echo "Error: " . $th->getMessage();
}

?>
