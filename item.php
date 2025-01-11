<?php
require('db_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = $cn->prepare("SELECT * FROM expense WHERE id = :id");
    $query->execute([':id' => $id]);

    $expense = $query->fetch(PDO::FETCH_ASSOC);

    if ($expense) {
        ?>
        <h1>Title: <?php echo htmlspecialchars($expense['title']); ?></h1>
        <h1>Note: <?php echo htmlspecialchars($expense['note']); ?></h1>
        <h1>Price: <?php echo htmlspecialchars($expense['price']); ?></h1>
        <h1>Date: <?php echo htmlspecialchars($expense['date']); ?></h1>
        <?php
    } else {
        echo "<h1>No expense found with id: " . htmlspecialchars($id) . "</h1>";
    }
} else {
    echo "<h1>Invalid or missing 'id' parameter.</h1>";
}
?>
