<!DOCTYPE html>
<html lang="fr">
<?php 
require('./includes/pdo.php');
require('./includes/functions.php');
include('./includes/header.php'); 

$success = false;
$errors = [];
if(!empty($_POST['submitted'])) {

    $nom = cleanXss('nom');
    $prenom = cleanXss('prenom');
    $email = cleanXss('email');

    $errors = validText($errors,$nom,'nom',2,10);
    $errors = validText($errors,$prenom,'prenom',2,10);
    $errors = validEmail($errors, $email, 'email');

    if(count($errors) === 0) {
        $requete_insert = "INSERT INTO users (nom,prenom,email,created_at) VALUES (:nom,:prenom,:email,NOW())";
        $query = $pdo->prepare($requete_insert);
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom, PDO::PARAM_STR);
        $query->bindValue(':email',$email, PDO::PARAM_STR);
        $query->execute();
        header('Location: list_users.php');
    }
}
?>
    <form action="" method="post" class="wrap2" novalidate>
        <label for="nom">
            <span>Nom :</span>
            <input type="text" name="nom" value="<?php if(!empty($_POST['nom'])) { echo $_POST['nom']; } ?>">
            <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>

        </label>
        <label for="prenom">
            <span>Prenom :</span>
            <input type="text" name="prenom" value="<?php if(!empty($_POST['prenom'])) { echo $_POST['prenom']; } ?>">
            <span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>
        </label>
        <label for="email">
            <span>Email :</span>
            <input type="text" name="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
            <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
        </label>
        <input type="submit" name="submitted" value="Ajouter un nouvel utilisateur">
    </form>
<?php include('./includes/footer.php'); ?>