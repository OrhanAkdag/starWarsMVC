<?php
    require 'include.php';

    if($_GET['controller'] === 'default' && $_GET['action'] === 'home.html'){
        $PlanetController = new DefaultController();
        $PlanetController->home();
    }
    else if($_GET['controller'] === 'default' && $_GET['action'] === 'planets-page.html'){
        $PlanetController = new DefaultController();
        $PlanetController->planetsPage();
    }
    else if($_GET['controller'] === 'default' && $_GET['action'] === 'vehicules-page.html'){
        $VehiculeController = new DefaultController();
        $VehiculeController->vehiculesPage();
    }
    else if($_GET['controller'] === 'planet' && $_GET['action'] === 'addForm'){
        $PlanetController = new PlanetController();
        $PlanetController->addForm();
    }
    else if($_GET['controller'] === 'planet' && $_GET['action'] === 'addPlanet'){
        $PlanetController = new PlanetController();
        $PlanetController->persistForm();
    }
    else if($_GET['controller'] === 'planet' && $_GET['action'] === 'delete' && isset($_GET['id'])){
        $PlanetController = new PlanetController();
        $PlanetController->delete($_GET['id']);
    }
    else if($_GET['controller'] === 'planet' && $_GET['action'] === 'updateForm' && isset($_GET['id'])){
        $PlanetController = new PlanetController();
        $PlanetController->updateForm($_GET['id']);
    }
    else if($_GET['controller'] === 'planet' && $_GET['action'] === 'updatePlanet' && isset($_GET['id'])){
        $PlanetController = new PlanetController();
        $PlanetController->updateplanet($_GET['id']);
    }
    else if($_GET['controller'] === 'vehicule' && $_GET['action'] === 'addForm'){
        $VehiculeController = new VehiculeController();
        $VehiculeController->addForm();
    }
    else if($_GET['controller'] === 'vehicule' && $_GET['action'] === 'addvehicule'){
        $VehiculeController = new VehiculeController();
        $VehiculeController->persistForm();
    }
    else if($_GET['controller'] === 'vehicule' && $_GET['action'] === 'delete' && isset($_GET['id'])){
        $VehiculeController = new VehiculeController();
        $VehiculeController->delete($_GET['id']);
    }
    else if($_GET['controller'] === 'vehicule' && $_GET['action'] === 'updateForm' && isset($_GET['id'])){
        $VehiculeController = new VehiculeController();
        $VehiculeController->updateForm($_GET['id']);
    }
    else if($_GET['controller'] === 'vehicule' && $_GET['action'] === 'updateVehicule' && isset($_GET['id'])){
        $VehiculeController = new VehiculeController();
        $VehiculeController->updateVehicule($_GET['id']);
    }
    else {
        throw new Exception('La page demandée n\'existe pas', 404);
    }
?>