<?php
class DefaultController{

    public function home()
    {
        $PlanetManager = new PlanetManager();
        $planets = $PlanetManager->selectAll();
        $vehiculeManager = new VehiculeManager();
        $vehicule = $vehiculeManager->selectAll();

        require 'View/home_view.php';
    }

    public function planetsPage()
    {
        $PlanetManager = new PlanetManager();
        $planets = $PlanetManager->selectAll();
        require 'View/planets_view.php';
    }
    public function vehiculesPage()
    {

        $vehiculeManager = new VehiculeManager();
        $CategorieManager = new CategorieManager();

        $vehicule = $vehiculeManager->selectAll();
        $categorie = $CategorieManager->selectAll();

        require 'View/vehicules_view.php';
    }

    public function categoriePage()
    {

        $categorieManager = new CategorieManager();
        $categorie = $categorieManager->selectAll();

        require 'View/categorie_view.php';
    }
}