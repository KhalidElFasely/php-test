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


function getListeFilieres(){
	return getCn()->query("select* from filiere")->fetchAll();
}

function getDetailEtudiant($code) {
	$cn = getCn();
	return $cn->query("select * from Etudiant where Code='$code'")-> fetch();
}


function getListeEtudiants(){
	return getCn()->query("select* from etudiant")->fetchAll();
}


function ajouterEtudiant($t){
	$resultat= getCn()->prepare("insert into Etudiant values (?,?,?,?,?)");
	$resultat->execute($t);	
}

function updateEtudiant($t){
	getCn()->exec("update Etudiant set Code='".$t["Code"]."', Nom='".$t["Nom"]."', Prenom='".$t["Prenom"]."',Filiere='".$t["Filiere"]."',Note=".$t["Note"]." where Code='".$t["oldCode"]."'");
}


function supprimerEtudiant($c){
	$resultat= getCn()->prepare("delete from Etudiant where Code=?");
	$resultat->execute([$c]);
}


?>