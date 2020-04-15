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
    <h1>Welcome to vehicule page</h1>

    <a href="../starwarsMVC/index.php?controller=vehicule&action=addForm">
        <button style="margin-bottom:10px;" class="btn btn-success">Ajouter un vehicule</button>
    </a>
    <table class="table">
        <thead>
            <td>@Id</td>
            <td>name</td>
            <td>Type</td>
            <td>Categorie</td>
            <td>Action</td>
        </thead>

        <tbody>
            <?php
                foreach ($vehicule as $veh) {
                    ?>
                    <tr>
                        <td><?php echo $veh->getId()?></td>
                        <td><?php echo $veh->getName()?></td>
                        <td><?php echo $veh->getType()?></td>
                        <td><?php 
                        foreach ($categorie as $cat) {
                            $res = $cat->getId();
                            $name = $cat->getName();
                            $catId= $veh->getCatid();
                            if ($res === $catId) {
                                echo $name;
                                }   
                            }
                            ?></td>
                        <td>
                            <a href="../starwarsMVC/index.php?controller=vehicule&action=delete&id=<?php echo $veh->getId()?>">Supprimer</a>
                            <a href="../starwarsMVC/index.php?controller=vehicule&action=updateForm&id=<?php echo $veh->getId()?>">Modifier</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <?php

                ?>
    </div>
    <?php
    include 'Parts/scripts.html'
    ?>
    </body>
</html>