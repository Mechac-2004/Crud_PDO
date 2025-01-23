<?php
$servername = "localhost";//nom du server
$username = "root";//nom de l'utilisateur(par défaut c'est "root")
$password = "";
$dbname = "todo_club";//nom de la base de donnée créée

try {
    // Création de la connexion
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (\Throwable $th) {
    die("La connexion a échoué");
    exit;
}

function save_tache(array $data) {
    global $connexion;
    $sql = ("INSERT INTO tache (title, description, date) values (:title, :description, :date)");
    $requete = $connexion -> prepare ($sql);
    return  $requete -> execute ($data);
} 
function taches(){
    global $connexion;
    $requete = $connexion->prepare("SELECT * FROM tache");
    $requete->execute();
    return $requete->fetchAll();
}

function delete_tache($id){
    global $connexion;
    $requete=$connexion->prepare("DELETE FROM tache WHERE id= :id");
    return $requete->execute(['id'=>$id]);
}
function terminer_tache($id){
    global $connexion;
    $sql="UPDATE tache SET status=:status  ,date_fin=:date_fin  WHERE id = :$id";
    $update=$connexion->prepare($sql);
    return $update->execute(['status'=>true , 'date_fin'=>date('Y-m-d')]);
}
function update_tache($data, $id) {
    global $connexion;
    $requete = $connexion->prepare("UPDATE tache SET title = :title, description = :description, date = :date WHERE id = '$id' ");
    return $requete->execute($data,$id);
}