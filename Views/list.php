
<h1>My expenses</h1>
<p>
    Create 
    <a href="Views/create.php">new expense</a>
</p>
<hr/>
<table border="1" align="center" width="60%">
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Price</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach ($expenses as $e) { ?>
        <tr>
            <td> <a href="Controllers/item.php?id=<?= $e[4]?>"> <?= $e[1] ?> </a> </td>
            <td> <?= $e[3] ?> </td>
            <td> <?= $e[0] ?> </td>
            <td> <a href="Controllers/delete.php?id=<?= $e[4]?>"> Delete </a> </td>
            <td> <a href="Controllers/edit.php?id=<?= $e[4]?>"> Modifier </a> </td>
        </tr>
    <?php } ?>
</table>
