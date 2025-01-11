<?php
require_once("db_connect.php");

try {
    if (!isset($_POST["id"]) || !is_numeric($_POST["id"])) {
        throw new Exception("Invalid id parameter");
    }
    $id = (int)$_POST["id"];
    $title = $_POST["title"];
    $note = $_POST["note"];
    $date = $_POST["date"];
    $price = $_POST["price"];

    if (!is_numeric($price)) {
        throw new Exception("Invalid price value");
    }

    $req = $cn->prepare("UPDATE expense SET title = :title, note = :note, date = :date, price = :price WHERE id = :id");
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':note', $note, PDO::PARAM_STR);
    $req->bindParam(':date', $date, PDO::PARAM_STR);
    $req->bindParam(':price', $price, PDO::PARAM_STR);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    // Redirect back to index
    header('Location: index.php');
    exit;

} catch (Throwable $th) {
    echo "Error: " . $th->getMessage();
}
?>
