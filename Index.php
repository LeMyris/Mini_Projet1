<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />

</head>
<body>
<form action="Formulaire.php" method="post" style="padding: 1em;">
    <button type="button" class="btn btn-primary" onclick="location.href='Formulaire_Crea.php'">+ Ajouter un SuperHero</button>
</form>
<form action="bdd.sql" method="get">
    <label for="search">Rechercher</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Search">
</form>
<table id="myTable" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Alias</th>
        <th>Capacité</th>
        <th>Origine</th>
        <th>Affiliation</th>
    </tr>
    </thead>

    <tbody>
    <?php
    require('Hero.php');
    $user="root";
    $pass="";
    $dbname="SuperHero";
    $host="localhost";

    $db=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $requete="";

    if(isset($_GET['search'])){
        $requete=$db->prepare("select * from hero 
         where nom like ?  or 
         capacite like ?");
        $valeur="%".$_GET['search']."%";
        $requete->bindParam(1,$valeur);
        $requete->bindParam(2, $valeur);
        $requete->execute();

    }
    else $requete=$db->query("select * from hero");

    $requete->setFetchMode(PDO::FETCH_CLASS,'hero');

    $heros=$requete->fetchAll();


    foreach ($heros as $hero) {

        echo "<tr>
        <td>".$hero->getId()."</td> 
        <td>".$hero->getNom()."</td> 
        <td>".$hero->getAlias()."</td> 
        <td>".$hero->getCapacite()."</td> 
        <td>".$hero->getOrigine()."</td>
        <td>".$hero->getAffiliation()."</td>
        </tr>";
    }
    ?>

    </tbody>

</table>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>

</body>
</html>