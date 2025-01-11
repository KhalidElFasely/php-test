<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
    <h1>Edit an expense:</h1>
    <form action="../Controllers/handle_edit.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($expense['id']) ?>">
        <pre>
            Title: <input type="text" name="title" value="<?= htmlspecialchars($expense['title']) ?>">
            Price: <input type="number" name="price" value="<?= htmlspecialchars($expense['price']) ?>">
            Note: <input type="text" name="note" value="<?= htmlspecialchars($expense['note']) ?>">
            Date: <input type="date" name="date" value="<?= htmlspecialchars($expense['date']) ?>">
        <input type="submit" value="Update">
        </pre>
    </form>
</body>
</html>