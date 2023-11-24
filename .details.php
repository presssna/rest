<?php

session_start();

if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `projet` WHERE `id`=:id';
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $liste = $query->fetch();
    if(!$liste){
        $_SESSION['erreur']= "cet id n'existe pas";
        header('Location: index.php');
    }

}else{
    $_SESSION['erreur']="URL invalide";
    header('Location: index.php');
}
?>
           <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details de la liste </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">

                <h1>détails de la liste <?= $liste['liste'] ?></h1>
                <p>ID : <?= $liste['id'] ?></p>
                <p>code : <?= $liste['code'] ?></p>
                <p>nom : <?= $liste['nom'] ?></p>
                <p>description: <?= $liste['description'] ?></p>
                <p>budget : <?= $liste['budget'] ?></p>
                <p>date-debut : <?= $liste['date-debut'] ?></p>
                <p>date-fin: <?= $liste['date-fin'] ?></p>
            </section>
        </div>
    </main>
</body>