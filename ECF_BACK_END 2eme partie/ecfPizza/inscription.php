<?php
session_start();
$db = new PDO ('mysql:host=localhost;dbname=ecf_pizza', 'root', '');
if(isset($_POST['submit'])){
    if(!empty($_POST['id']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['id']);
        $mdp = sha1($_POST['mdp']);
        $insertUser = $db->prepare('INSERT INTO users(id, mdp)VALUES(?, ?)');
        $insertUser->execute(array(`ecf_pizza` . `pizza` . `id_pizza`));

        $recupUser = $db->prepare("SELECT P.nom_pizza, P.prix_pizza, B.nom_base FROM pizza as P
        INNER JOIN base AS B on P.id_base = B.id_base
         WHERE id_pizza = ?");
         
        $recupUser->execute(array(`ecf_pizza` . `pizza` . `id_pizza`));
        if($recupUser->rowCount() > 0){
       $_SESSION['id'] = $id;
       $_SESSION['mdp'] = $mdp;
       $_SESSION['id_pizza'] = $recupUser->fetch()['id_pizza'];
    }
    echo $_SESSION['id_pizza'];
}else{
    echo "Veuillez remplir tous les champs";
}
}