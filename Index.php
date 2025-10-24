<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
<form action="Index.php" method="post" style="padding: 1em;">
    <button type="button" class="btn btn-primary" onclick="location.href='Formulaire_Crea.php'" style="background: limegreen">+ Ajouter un SuperHero</button>
</form>
<form action="bdd.sql" method="get" style="padding: 1em;">
    <input type="text" name="search" id="search">
    <input type="submit" value="Rechercher">
</form>
<table id="myTable" class="table table-bordered" style="width:100%">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">Alias</th>
        <th scope="col">Capacité</th>
        <th scope="col">Origine</th>
        <th scope="col">Affiliation</th>
        <th scope="col">Action</th>
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
        $valeur="%".$_POST['search']."%";
        $requete->bindParam(1,$valeur);
        $requete->bindParam(2, $valeur);
        $requete->execute();

    }
    else $requete=$db->query("select * from hero");

    $requete->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Hero");

    $heros=$requete->fetchAll();


    foreach ($heros as $hero) {

        echo "<tr>
        <td>".$hero->getId()."</td> 
        <td>".$hero->getNom()."</td> 
        <td>".$hero->getAlias()."</td> 
        <td>".$hero->getCapacite()."</td> 
        <td>".$hero->getOrigine()."</td>
        <td>".$hero->getAffiliation()."</td>
        <th><button class='btn btn-primary' style='background: dodgerblue'>Edit</button><button type='button' id='supp' formmethod='post' formaction='bdd.sql' class='btn btn-primary' style='background: darkred'>Delete</button></th>
        </tr>";
    }

    if (isset($_POST['supp'])) {
        $db->beginTransaction();
        $sql = 'DELETE FROM hero WHERE id=?';
        $requete = $db->prepare($sql);
        $valeur=$_GET['del'];
        $requete->bindParam(1, $valeur());
        $requete->execute();
        $db->commit();
    }

    ?>

    </tbody>

</table>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>