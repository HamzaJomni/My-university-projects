<?php
// On démarre une session
session_start();
// $_POST est une super variable globale PHP qui est utilisée pour collecter des données de formulaire

/*isset() permet de vérifier que la donnée $_POST['password'] existe. car si elle n'existe pas 
$_POST['password']=='***' lancera une erreur PHP. Donc isset permet de prévenir des erreur PHP */

if($_POST){
    if(isset($_POST['joueur']) && !empty($_POST['joueur'])//if il est défini(isset) et pas vide(!empty) 
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['nombre']) && !empty($_POST['nombre'])){
        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées // strip_tags Supprime la chaîne des balises HTML 
        $joueur = strip_tags($_POST['joueur']);
        $email = strip_tags($_POST['email']);
        $nombre = strip_tags($_POST['nombre']); 

        $sql = 'INSERT INTO `players` (`joueur`, `email`, `nombre`) VALUES (:joueur, :email, :nombre);';

        $query = $db->prepare($sql);
        //les données saisie sont stocker avec bindValue pour étre inserer sur la table
        $query->bindValue(':joueur', $joueur, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "Joueur ajouté";
        require_once('close.php');

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.php">
    <title>Ajouter un joueur</title>

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
                <h1>Ajouter un joueur</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="joueur">User Name</label>
                        <input type="text" id="joueur" name="joueur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="nombre">Numéro</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" onchange="zonetel()" onkeyup="veriftel()">
                    </div>
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </section>
        </div>
    </main>
    <script src="code.js"></script>
</body>
</html>
