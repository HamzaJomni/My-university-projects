<?php
// On démarre une session
session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['joueur']) && !empty($_POST['joueur'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['nombre']) && !empty($_POST['nombre'])){
        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $joueur = strip_tags($_POST['joueur']);
        $email = strip_tags($_POST['email']);
        $nombre = strip_tags($_POST['nombre']);

        $sql = 'UPDATE `players` SET `joueur`=:joueur, `email`=:email, `nombre`=:nombre WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':joueur', $joueur, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "joueur modifié";
        require_once('close.php');

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

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
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un joueur</title>
    <link rel="stylesheet" type="text/css" href="style.php">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container main2">
        <div class="row">
            <section class="col-12">
                <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <h1>Modifier un joueur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="joueur">User Name</label>
                        <input type="text" id="joueur" name="joueur" class="form-control" value="<?= $joueur['joueur']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?= $joueur['email']?>">

                    </div>
                    <div class="form-group">
                        <label for="nombre">Numéro</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $joueur['nombre']?>" onchange="zonetel()" onkeyup="veriftel()">
                        
                    </div>
                    <input type="hidden" value="<?= $joueur['id']?>" name="id">
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
    <script src="code.js"></script>
</body>
</html>