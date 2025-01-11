<?php
require_once("db_connect.php");

try {
    // Get the `id` from the URL
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        throw new Exception("Invalid id parameter");
    }
    $id = (int)$_GET["id"];

    // Fetch the expense details
    $req = $cn->prepare("SELECT * FROM expense WHERE id = :id");
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $expense = $req->fetch();

    if (!$expense) {
        throw new Exception("Expense not found");
    }
} catch (Throwable $th) {
    echo "Error: " . $th->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <h1>Edit an expense:</h1>
    <form action="handle_edit.php" method="post">
        <input type="hidden" name="id" value="<?= $expense['id'] ?>">
        <pre>
            Title: <input type="text" name="title" value="<?= $expense['title'] ?>">
            Price: <input type="number" name="price" value="<?= $expense['price'] ?>">
            Note: <input type="text" name="note" value="<?= $expense['note'] ?>">
            Date: <input type="date" name="date" value="<?= $expense['date'] ?>">
        <input type="submit" value="Update">
        </pre>
    </form>
</body>
</html>
