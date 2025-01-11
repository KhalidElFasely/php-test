<?php
require('../Models/db_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $expense = getDetailExpense($id);

    if ($expense) {
        require('../Views/detail.php');
    } else {
        echo "<h1>No expense found with id: " . htmlspecialchars($id) . "</h1>";
    }
} else {
    echo "<h1>Invalid or missing 'id' parameter.</h1>";
}
?>
