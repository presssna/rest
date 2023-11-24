<?php
 
session_start();   
// On inclut la connexion à la base
require_once('connect.php');

// On écrit notre requête
$sql = 'SELECT * FROM `projet`';

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
    <title>liste</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php

                    if(!empty($_SESSION ['erreur'])){
                        echo'<div class="alert alert-danger" role="alert">
                        '. $_SESSION ['erreur'].'
                      </div>';

                        $_SESSION ['erreur']="";
                    }

                    ?>
                <table class="table">

                    <thead>
                        <th>ID</th>
                        <th>code</th>
                        <th>nom</th>
                        <th>description</th>
                        <th>budget</th>
                        <th>date debut</th>
                        <th>date fin</th>
                        <th>statut</th>
                        <th>action</th>


                    </thead>
                    <tbody>
        <?php

            foreach($result as $liste){
        ?>
                <tr>
                    <td><?= $liste['id'] ?></td>
                    <td><?= $liste['code'] ?></td>
                    <td><?= $liste['nom'] ?></td>
                    <td><?= $liste['description'] ?></td> 
                    <td><?= $liste['budget'] ?></td> 
                    <td><?= $liste['date-debut'] ?></td>
                    <td><?= $liste['date-fin'] ?></td>
                     <td><?= $liste['statut'] ?>
                    </td><td><a href="details.php?id=<?= $liste['id'] ?>">Voir</a> <a href="edit.php?id=<?= $liste['id']?>">Modifier</a>  <a href="delete.php?id=<?= $liste['id'] ?>">Supprimer</a></td>


                 </tr>
        <?php
            }
        ?>
        </tbody>

                </table>
                <a href="add.php"class="btn btn-primary">Ajouter</a>

            </section>
         </div>
    </main>
</body>
</html>


    

        
      
    
  
  
