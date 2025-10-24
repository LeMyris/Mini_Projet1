<?php
require("Hero.php");
/*SESSION_START();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>

    <form action="Formulaire.php" method="post" style="padding: 1em;">
            <div class="mb-3">
                <label for="nom" class="form-label" style="font-weight: bold;" >Nom du Héro</label>
                <input name="nom" type="text" class="form-control" id="nom">
            </div>
            <div class="mb-3">
                <label for="alias" class="form-label" style="font-weight: bold;" >Alias</label>
                <input name="alias" type="text" class="form-control" id="alias">
            </div>
            <div class="mb-3">
                <label for="capacite" class="form-label" style="font-weight: bold;" >Capacité</label>
                <input name="capacite" type="text" class="form-control" id="capacite">
            </div>
            <div class="mb-3">
                <label for="origine" class="form-label" style="font-weight: bold;" >Origine</label>
                <input name="origine" type="text" class="form-control" id="origine">
            </div>
            <div class="mb-3">
                <label for="affiliation" class="form-label" style="font-weight: bold;" >Affiliation</label>
                <input name="affiliation" type="text" class="form-control" id="affiliation">
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>

    <?php

        if(isset($_POST["nom"]) && ($_POST["alias"]) && ($_POST["capacite"]) && ($_POST["origine"]) && ($_POST["affiliation"])){
            $nom = $_POST['nom'];
            $capacite = $_POST['capacite'];

            $hero = new Hero($nom, $capacite);

            $heros[]=$hero;
            $_SESSION["heros"] = $heros;
            foreach($heros as $hero){
                echo $hero;
            }
        }


    ?>
</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
