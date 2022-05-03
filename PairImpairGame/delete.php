<?php
// On démarre une session
session_start();

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `players` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le joueur
    $joueur = $query->fetch();

    // On vérifie si le joueur existe
    if(!$joueur){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
        die();
    }

    $sql = 'DELETE FROM `players` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    //$_SESSION Une session est un moyen de stocker des informations (dans des variables) à utiliser sur plusieurs pages
    $_SESSION['message'] = "joueur supprimé";
    header('Location: index.php');


}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
