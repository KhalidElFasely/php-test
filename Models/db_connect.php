<?php

function getCn(){
	static $cn;
	//connexion à la base de données
    $user = 'root';
    $password = 'info';
    $db = 'mysql:host=localhost:3306; dbname=php_test';

    try {
        $cn = new PDO($db, $user, $password);
        // echo "Connexion bien établie";
    } catch (PDOException $dbex) {
        die("Erreur de connexion: " . $dbex->getMessage());
    }
	return $cn;
}

function indexDisplay(){
	$expenses = getListeExpenses();
	require('Views/list.php');
}

function getListeExpenses(){
	return getCn()->query("select * from expense")->fetchAll();
}

function getDetailExpense($id) {
	$cn = getCn();
	return $cn->query("select * from expense where id='$id'")-> fetch();
}


function addExpense($title, $price, $note, $date){
    $resultat = getCn()->prepare("insert into expense (title, price, note, date) values (?, ?, ?, ?)");
    $data = [$title, $price, $note, $date];  // Create array of parameters
    $resultat->execute($data);
}

function updateExpense($id, $title, $note, $date, $price) {
    $req = getCn()->prepare("UPDATE expense SET title = :title, note = :note, date = :date, price = :price WHERE id = :id");
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':note', $note, PDO::PARAM_STR);
    $req->bindParam(':date', $date, PDO::PARAM_STR);
    $req->bindParam(':price', $price, PDO::PARAM_STR);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
}


function deleteExpense($id){
	$resultat= getCn()->prepare("delete from expense where id=?");
	$resultat->execute([$id]);
}


?>