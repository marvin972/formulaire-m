<?php
require('./includes/pdo.php');
require('./includes/functions.php');
?>
<?php
$select_users = "SELECT * FROM users ORDER BY created_at DESC";
$query = $pdo->prepare($select_users);
$query->execute();
$users = $query->fetchAll();
?>
<h1>Liste des users</h1>
<table>
   <thead>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th></th>
        <th></th>
    </tr>
   </thead>
   <tbody>
<?php foreach ($users as $user) { ?>
    <tr>
        <td><?=$user['id']?></td>
        <td><?=$user['nom']?></td>
        <td><?=$user['prenom']?></td>
        <td><?=$user['email']?></td>
        <td><a href="edit_user.php?id=<?=$user['id']?>">Editer</a></td>
        <!-- <td><a href="supp_user.php?id=<?=$user['id']?>" onclick="confirm('Etes vous certain de supprimer cet utlisateur')" >Supprimer</a></td> -->
        <td><a href="supp_user.php?id=<?=$user['id']?>">Supprimer</a></td>
    </tr>
<?php } ?>
   </tbody>
</table>