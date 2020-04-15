<?php
class CategorieController{

    public function addForm()
    {

        require 'View/insert_form_categorie.php';
    }

    public function persistForm()
    {

        $categorie = new Categorie(null, $_POST['name']);
        $categorieManager = new CategorieManager();
        $categorieManager->insert($categorie);
        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }

    public function delete($id)
    {
        $categorieManager = new CategorieManager();
        $categorieManager->delete($id);
        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }

    public function updateForm($id)
    {

        $categorieManager = new CategorieManager();
        $categorie = $categorieManager->select($id);

        require 'View/update_form_categorie.php';
    }

    public function updateCategorie($id)
    {
        $categorieManager = new CategorieManager();
        $categorie = $categorieManager->select($id);
        $categorie = new categorie($id, $_POST['name']);
        $categorieManager->update($categorie);

        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }
}