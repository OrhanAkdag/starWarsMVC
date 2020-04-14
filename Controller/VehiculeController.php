<?php
class VehiculeController{

    public function addForm()
    {
        $type=[
            'Diesel',
            'Essence',
            'Electrique'
        ];
        require 'View/insert_form_Vehicule.php';
    }

    public function persistForm()
    {

        $vehicule = new Vehicule(null, $_POST['name'], $_POST['type']);
        $VehiculeManager = new VehiculeManager();
        $VehiculeManager->insert($vehicule);
        header('Location: /starwarsMVC/index.php?controller=default&action=home');
    }

    public function delete($id)
    {
        $VehiculeManager = new VehiculeManager();
        $VehiculeManager->delete($id);
        header('Location: /starwarsMVC/index.php?controller=default&action=home');
    }

    public function updateForm($id)
    {
        $type=[
            'Diesel',
            'Essence',
            'Electrique'
        ];

        $VehiculeManager = new VehiculeManager();
        $vehicule = $VehiculeManager->select($id);

        require 'View/update_form_vehicule.php';
    }

    public function updateVehicule($id)
    {
        $VehiculeManager = new VehiculeManager();
        $vehicule = $VehiculeManager->select($id);
        $vehicule = new Vehicule($id, $_POST['name'], $_POST['type']);
        $VehiculeManager->update($vehicule);

        header('Location: /starwarsMVC/index.php?controller=default&action=home');
    }
}