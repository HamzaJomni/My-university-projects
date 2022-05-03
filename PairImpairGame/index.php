<?php
// On démarre une session
session_start();

// On inclut la connexion à la base
require_once('connect.php');

$sql = 'SELECT * FROM `players`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
 
require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joueurs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.php">
</head>
<body>
    
    <main class="container main">
        <div class="row">
            <section class="col-12 premierePartie">
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                              </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";
                    }
                ?>
                <h1>Liste des Joueurs</h1>
                <table class="table tableau">
                    <thead>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Numéro</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $joueur){
                        ?>
                            <tr>
                                <td><?= $joueur['id'] ?></td>
                                <td><?= $joueur['joueur'] ?></td>
                                <td><?= $joueur['email'] ?></td>
                                <td><?= $joueur['nombre'] ?></td>
                                <td>
                                 <a href="details.php?id=<?= $joueur['id'] ?>">Voir</a>
                                  <a href="edit.php?id=<?= $joueur['id'] ?>">Modifier</a>
                                   <a href="delete.php?id=<?= $joueur['id'] ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Nouveau joueur</a>
            </section>
        </div>

<!--------------------------------------------Pair Impair jeu ------------------------------------------>
<div align='right'><button type="button" class='bouttonPlay'><a href="#letsplays"> Let's play</a></button> </div>
<section class= description>
<br>
        <h2>Présentation du Jeu antique « pair impair »</h2>
    <p>Ce jeu de hasard, qui porte à peu près le même nom chez tous les peuples, est sans doute un des premiers que l’homme ait imaginés. Les Grecs disaient jouer à pair (αρτιάζω) – Platon, Aristophane et Aristote le mentionnent – et les Romains à pair impair (par impar ludere) – Ovide en parle. Et on le retrouve sous le nom de « pair ou non » chez Rabelais en 1534.</p>
    <br><br>
    <h3>Description simple du jeu</h3>   
    <p>1) tu décide de miser combien de noix pour la premire manche</p>                  
    <p>2) Les deux joueurs commencent, dans leur poing fermé, les deux joueurs tiennent un certain nombre aléatoire de noix, Il cache les autres noix dans leurs poches.</p>
    <p>3) Les deux joueurs posent la question : « Pair ou impair ? »</p>
    <p>4) tu dois deviner s’il en cache un nombre pair ou impair dans la somme total des noix caché des deux joueurs.</p>
    <p>5) Si tu devines la bonne réponse, tu gagnes les noix miser, dans le cas contraire tu perds autant de noix miser.</p>
    <p>- Plus tu gagne plus tu remporte des noix, plus tu perd plus ton nombres de noix diminue jusqu'a 0.</p>
    <p>- Tu perds la partie si ton nombre de noix <img src='img/icon-noix3.png'> tombe à 0.</p>
    <br>
    <center>
        <img src='img/desc1.jpg' height='300px' width='450px'><img src='img/desc2.jpg' height='300px' width='450px'>
        <br> <br>
        <img src='img/desc3.jpg' height='300px' width='450px'><img src='img/desc4.jpg' height='300px' width='450px'>
    </center>
    <br>
    <div align='right'><a href="document/lejeu.pdf">Cliquer Pour plus d'information</a>  </div>                           
    </section>
    <section class= "imgdesc containerImg">

    </section>
<div class=deuxiemePartie>

 <section class = LeJeu>
    <div class= titre id='letsplays'>Pair Ou Impair Le Jeu</div>
   <div class = mot1> Nombre de noix <img src='img/icon-noix1.png'> cachées les mains de <?php echo( $joueur['joueur']) ?> : <span id="noix"></span> </div>
  
    <div id="PairOuImpair"></div>
    <form>
    Parier sur:
    <input id=FaireUnPari type="range" min="1" max="20" value="5" step="1" onchange="afficheValeur(this.value)" />
    <span id="affichePari">5</span> <img src='img/icon-noix3.png'> Noix
    <button type="button" onclick="choixPairOuImpair = 0; GagnerOuPerdre()">Pair</button>
    <button type="button" onclick="choixPairOuImpair = 1; GagnerOuPerdre()">Impair</button>
    </form>
    <p id="msg"></p>
    Vous avez <span id=Noix>10</span> <img src='img/icon-noix2.png'> Noix à miser.


    <script src="code.js"></script>
</section>
</div>

</main>
</body>
</html>