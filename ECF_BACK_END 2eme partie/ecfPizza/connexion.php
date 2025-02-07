<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=ecf_pizza', 'root', '');
if(isset($_POST['submit'])){
    if(!empty($_POST['id']) AND !empty($_POST['mdp'])){
$pseudo = htmlspecialchars($_POST['id']);
$mdp = sha1($_POST['mdp']);

$recupUser = $db->prepare("SELECT P.nom_pizza, P.prix_pizza, B.nom_base FROM pizza as P
INNER JOIN base AS B on P.id_base = B.id_base
 WHERE id_pizza = ?");

$recupUser->execute(array(`ecf_pizza` . `pizza` . `id_pizza`));

if($recupUser->rowCount() > 0){

$_SESSION['id'] = $nom_pizza;
$_SESSION['mdp'] = $mdp;
$_SESSION['id_pizza'] = $recupUser->fetch()['id_pizza'];
header('location: index.php');

    }else{
        echo "Votre pseudo ou mot de passe est incorrect";
    }
    }else{ 
        echo "Veuillez remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action ="" align="center">
        <input type="text" name="nom_pizza" placeholder="login" autocomplete="off">
        <input type="password" name="mdp" placeholder="password" autocomplete="off">
        <input type="submit" name="">

    </form>
</body>
</html>