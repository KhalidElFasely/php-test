<?php

require('db_connect.php');

$query = $cn->prepare("SELECT id, price, title, date FROM expense");
$query->execute();
$expenses = $query->fetchAll();

?>

<h1>My expenses</h1>
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
            <td> <a href="item.php?id=<?= $e[0]?>"> <?= $e[2] ?> </a> </td>
            <td> <?= $e[3] ?> </td>
            <td> <?= $e[1] ?> </td>
            <td> <a href="delete.php?id=<?= $e[0]?>"> Delete </a> </td>
            <td> <a href="edit.php?id=<?= $e[0]?>"> Modifier </a> </td>
        </tr>
    <?php } ?>
</table>
