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
    <h1>Welcome to categorie page</h1>

    <a href="../starwarsMVC/index.php?controller=categorie&action=addForm">
        <button style="margin-bottom:10px;" class="btn btn-success">Ajouter une categorie</button>
    </a>
    <table class="table">
        <thead>
            <td>@Id</td>
            <td>name</td>
            <td>Action</td>
        </thead>

        <tbody>
            <?php
                foreach ($categorie as $cat) {
                    ?>
                    <tr>
                        <td><?php echo $cat->getId()?></td>
                        <td><?php echo $cat->getName()?></td>
                        <td>
                            <a href="../starwarsMVC/index.php?controller=categorie&action=delete&id=<?php echo $cat->getId()?>">Supprimer</a>
                            <a href="../starwarsMVC/index.php?controller=categorie&action=updateForm&id=<?php echo $cat->getId()?>">Modifier</a>
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