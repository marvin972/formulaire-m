<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire-M</title>
    <link rel="stylesheet" href="/asset/style.css">
</head>
<?php
require('./includes/functions');
require('./includes/pdo.php');

?>
<body>
    
<form action="" method="POST" class="wrap2">

<label for="nom">Nom</label>
<input type="text" name="nom" id="nom">

<label for="prenom">Prénom</label>
<input type="text" name="prenom" id="prenom">

<label for="email">Email</label>
<input type="email" name="email" id="email">

<input type="submit" name="submit" value="Ajouter un utilisateur">



</form>



</body>
</html>