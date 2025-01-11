<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>Add an expense:</h1>
        <form action="handle_create.php" method="post">
            <pre>
                Title: <input type="text" name="title">
                Price: <input type="number" name="price">
                Note: <input type="text" name="note">
                Date: <input type="date" name="date">
            <input type="submit" value = "Submit">
            </pre>
        </form>
    </body>
</html>