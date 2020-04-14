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
    <h1>Welcome to my homepage</h1>

    <a href="../starwarsMVC/index.php?controller=planet&action=addForm">
        <button style="margin-bottom:10px;" class="btn btn-success">Ajouter une planète</button>
    </a>
    <table class="table">
        <thead>
            <td>@Id</td>
            <td>name</td>
            <td>terrain</td>
            <td>allegiance</td>
            <td>status</td>
            <td>key fact</td>
            <td>image</td>
            <td>Action</td>
        </thead>

        <tbody>
            <?php
                foreach ($planets as $pla) {
                    ?>
                    <tr>
                        <td><?php echo $pla->getId()?></td>
                        <td><?php echo $pla->getName()?></td>
                        <td><?php echo $pla->getTerrain()?></td>
                        <td><?php echo $pla->getAllegiance()?></td>
                        <td><?php echo $pla->getStatus()?></td>
                        <td><?php echo $pla->getKey_fact()?></td>
                        <td>
                        <img style="max-width: 140px;" src="<?php echo('assets/img/'.$art->getImage()); ?>"
                            alt="Image de la planète <?php $art->getImage(); ?>"/>                     
                        </td>
                        <td>
                            <a href="../starwarsMVC/index.php?controller=planet&action=delete&id=<?php echo $art->getId()?>">Supprimer</a>
                            <a href="../starwarsMVC/index.php?controller=planet&action=updateForm&id=<?php echo $art->getId()?>">Modifier</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    </div>
    <?php
    include 'Parts/scripts.html'
    ?>
    </body>
</html>