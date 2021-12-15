
<?php
include '../model/Connexion.php';

try {

    $connect = new Connexion();
    $pdo = $connect->connexion();
    $query = 'DELETE FROM song WHERE id=:id';
    $resultats = $pdo->prepare($query);
    $resultats->execute([
            ':id' => $_GET['id']]
    );

} catch (Exception $e) {
    echo $e->getMessage();
}



header('location:../listsong');