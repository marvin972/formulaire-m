<?php
require('./includes/pdo.php');
require('./includes/functions.php');

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE  FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->execute();
     header('Location: list_users.php');
}else {
    die('404');
}
include('/includes/header.php'); ?>
    <h1>Page Supprime utilisateur</h1>
    <p><?php echo $users['id']; ?></p>
    <h2><?php echo ucfirst($users['nom']); ?></h2>
    <p><?php echo nl2br($users['prenom']); ?></p>
    <p>Date: <?php echo date('d/m/Y à H:i:s', strtotime($users['created_at'])); ?></p>
<?php include('includes/footer.php');
