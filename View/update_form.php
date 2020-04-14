
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
<div class="container my-2">
    <h1>Mise à jour de la planète <?php echo $planet->getName();?></h1>
    <a href="../starwarsMVC/index.php?controller=default&action=home">
        <button style="margin-bottom:10px;" class="btn btn-success">Revenir en arrière</button>
    </a>
    <form method="post" action="index.php?controller=planet&action=updatePlanet&id=<?php echo $planet->getId()?>" class="p-5 shadow bg-dark" enctype="multipart/form-data">
        <div class="form-group">
            <label class="text-white">Nom de la planète</label>
            <input type="text" name="name" value="<?php echo $planet->getName()?>" class="form-control" placeholder="Nom de la planète">
        </div>
        <div class="form-group">
            <label class="text-white">Status de la planète</label>
            <input type="text" name="status" value="<?php echo $planet->getStatus()?>" class="form-control" placeholder="Status de la planète">
        </div>
        <div class="form-group">
            <label class="text-white">Terrain</label>
            <input type="text" name="terrain" value="<?php echo $planet->getTerrain()?>" class="form-control" placeholder="Terrain">
        </div>

        <div class="form-group">
            <label class="text-white">Allegiance</label>
            <select name="allegiance" class="form-control" placeholder="Allegiance">
            <?php

            foreach ($allegiance as $allegiances) {
                $selected = '';
                if($planet->getAllegiance() === $allegiances){
                    $selected = 'selected';
                }
                echo('<option '.$selected.' value="'.$allegiances.'">'.$allegiances.'</option>');
            }
            ?>
            </select>
        </div>

        <div class="form-group">
            <label class="text-white">Key facts</label>
            <textarea type="text" name="key_fact" class="form-control"><?php echo $planet->getKey_fact()?> 
            </textarea>
        </div>
        <div class="form-group">
            <?php var_dump($planet->getImage()); ?>
            <label class="text-white">Image</label>
            <img src="<?php echo('assets/img/'.$planet->getImage());?>" style="max-width: 150px;">
            <input  class="text-white" type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>
<?php
 include 'Parts/scripts.html'
?>
</body>