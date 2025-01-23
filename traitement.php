<?php
require_once('functions.php');

if((isset($_POST['save_tache'], $_POST['title'], $_POST['description'])) && !empty($_POST['title']) && !empty($_POST['description'])){
    $data = [
        'title' => htmlentities($_POST['title']),
        'description' => htmlentities($_POST['description']),
        'date' => htmlentities($_POST['date'])
    ];
    
    if($_POST['save_tache'] == 'save'){
        $output = save_tache($data);
    }else{
        $id = htmlentities($_POST['id']);
        $output = update_tache($data, $id);
    }
    if( $output ){
        header('Location: index.php?status=success');
    }else{
        header('Location: index.php?status=error');
    }
}


if(isset($_GET['delete'])&& !empty ($_GET['id'])){  
    $output=delete_tache(htmlentities($_GET['id']));
    if ($output){
        header('Location:index.php?statut=succes');
    }else{
        header('Location:index.php?statut=error');
    }
}

if(isset($_GET['terminer'])&& !empty ($_GET['id'])){  
    $output=terminer_tache(htmlentities($_GET['id']));
    if ($output){
        header('Location:index.php?statut=succes');
    }else{
        header('Location:index.php?statut=error');
    }
}

header('Location: index.php');


