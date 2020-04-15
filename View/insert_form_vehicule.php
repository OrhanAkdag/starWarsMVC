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
<h1>Ajout d'un nouvel vehicule</h1>

    <a href="../correctionMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

<form method="post" action="index.php?controller=vehicule&action=addvehicule">
<label>Name</label>
<input name="name" class="form-control">

<?php
               // var_dump($type);
            ?>
<div class="form-group">
            <label class="text-white">Type</label>
            <select name="type" class="form-control" placeholder="Type">
            <?php
                foreach($type as $types){
                    echo('<option value="'.$types.'">'.$types.'</option>');
                }
            ?>
            </select>
</div>

<div class="form-group">
            <label class="text-white">Type</label>
            <?php
              //  var_dump($categorie);

            ?>
            <select name="catid" class="form-control" placeholder="Type">
            <?php
                var_dump($categorie);
                foreach($categorie as $cat){
                    echo('<option value="'.$cat->getId().'">'.$cat->getName().'</option>');
                }
            ?>
            </select>
</div>

    <input class="btn btn-success" type="submit" value="valider">
</form>
</div>
<?php
 include 'Parts/scripts.html'
?>
</body>