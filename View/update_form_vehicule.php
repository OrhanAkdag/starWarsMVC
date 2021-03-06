<html>
<head>
    <?php
    include 'Parts/stylesheets.html'
    ?>
</head>

<body>
<?php 
include 'navbar.php';
var_dump($vehicule);

var_dump($categorie);
var_dump($type);

?>
<div class="container">
    <h1>Mise à jour du vehicule <?php echo $vehicule->getName();?></h1>

    <a href="../correctionMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>

    <form method="post" action="index.php?controller=vehicule&action=updateVehicule&id=<?php echo $vehicule->getId()?>">
        <label>Name</label>
        <input name="name" value="<?php echo $vehicule->getName()?>" class="form-control">

        <div class="form-group">
            <label class="text-white">Type</label>
            <select name="type" class="form-control" placeholder="Allegiance">
            <?php

            foreach ($type as $types) {
                $selected = '';
                if($vehicule->getType() === $types){
                    $selected = 'selected';
                }
                echo('<option '.$selected.' value="'.$types.'">'.$types.'</option>');
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
                //var_dump($categorie);
                foreach($categorie as $cat){
                    $selected = '';
                    if($vehicule->getCatid() === $cat->getId()){
                        $selected = 'selected';
                    }
                    echo('<option '.$selected.' value="'.$cat->getId().'">'.$cat->getName().'</option>');
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