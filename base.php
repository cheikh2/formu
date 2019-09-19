<?php require_once 'fonctions.php'; 
$connexion = getConnexion();

$requete=$connexion->prepare("SELECT COUNT(*) FROM employers");//selectionner le nombre de colonne
$requete->execute();//executer la requete
$execut=$requete->fetchColumn();//retourne le nombre de ligne de la table
$mat=$execut+1;//incrementer
$matricule=sprintf("%05d",$mat)//definir le format

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/js.css">
</head>
<body>
<div class="nav navbar-dark bg-primary">
    <div class="container-fluid">
     <ul class="nav navbar-nav">
     <li><a href="base.php" class="btn btn-success">AJOUTER DES EMPLOYERS</a></li>
     <li><a href="lister.php" class="btn btn-success">LISTE DES EMPLOYERS</a></li>
     </ul>
    </div>
</div>

<?php
if(!empty($_POST)){

    $errors=array();


    if(empty($_POST['nom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nom'])){
        $errors['nom'] = "votre nom n'est pas valide";
    }

    if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['prenom'])){
        $errors['prenom'] = "votre prenom n'est pas valide";
    }

    if(isset($_POST['date'])){ $vdate=explode("/",$_POST['date']);
    if(!checkdate($vdate[1],$vdate[0],$vdate[2])){
        $errors['date'] = "Date de naissance invalide";
    } 
 }

 if(isset($_POST['salaire'])){
    if(($_POST['salaire'])>=25000 && ($_POST['salaire'])<=2000000){
     
    }else{
        $errors['nom'] = "salaire invalide";
    }
}

    if(empty($_POST['tel']) || !preg_match('#^7[0,6,7,8]([0-9]){7}$#', $_POST['tel'])){
        $errors['tel'] = "votre telephone n'est pas valide";
    }


    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "votre email n'est pas valide";
    }

    if(empty($errors)){

    require_once 'connexion.php';


    $requete = $connexion -> prepare("INSERT INTO employers SET  matricule = ?, nom = ?, prenom = ?, date = ?, salaire = ?, tel = ?, email = ?");
    $requete -> execute([$_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['salaire'], $_POST['tel'], $_POST['email']]);
    die('une ligne a été ajoutéé');
    }

}


?>

<?php  if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach($errors as $error): ?>
        <li> <?= $error; ?> </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">FORMULAIRE D'AJOUT D'EMPLOYERS</div>
            <div class="panel-body">

    <form  action="" method="POST">

    <div class="form-group">
        <label for="" class="form control-label"></label>
        <input type="text" class="form-control" name="matricule" readonly value="EM-<?php echo $matricule; ?>"> 
        </div>

        <div class="form-group">
        <label for="" class="form control-label"></label>
        nom: <input type="text" class="form-control" name="nom" placeholder="Veuillez entrer votre nom" required>
        </div>

        <div class="form-group">
        <label for="" class="form control-label"></label>
        Prenom: <input type="text" class="form-control" name="prenom" placeholder="Veuillez entrer votre prenom" required>
        </div>

        <div class="form-group">
        <label for="" class="form control-label"></label>
        Date de naissance: <input type="text" class="form-control" name="date" placeholder="jj/MM/AA" required>
        </div>
        

        <div class="form-group">
        <label for="" class="form control-label"></label>
        Salaire: <input type="text" class="form-control" name="salaire" placeholder="50000-2000000" required> 
        </div>
        
        <div class="form-group">
        <label for="" class="form control-label"></label>
        Téléphone: <input type="text" class="form-control" name="tel" placeholder="777777777" required>
        </div>
        
        <div class="form-group">
        <label for="" class="form control-label"></label>
        Email: <input type="text" class="form-control" name="email" placeholder="aaaa@gmail.com" required>
        </div>
    
        <input  class="btn btn-success" type="submit" name="Envoyer" value="Envoyer">
        <a href="lister.php" class="btn btn-warning">Annuler</a>
      
    </form>
    
            </div>
        </div>
    </div>
</body>

