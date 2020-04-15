<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<?php 
include 'navbar.php'
?>
<div class="container">
    <h1>Mise à jour d'une catégorie' <?php echo $categorie->getName();?></h1>

    <a href="../correctionMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

    <form method="post" action="index.php?controller=categorie&action=updateCategorie&id=<?php echo $categorie->getId()?>">
        <label>Name</label>
        <input name="name" value="<?php echo $categorie->getName()?>" class="form-control">

        <input class="btn btn-success" type="submit" value="valider">
    </form>
</div>
<?php
include 'Parts/scripts.html'
?>
</body>