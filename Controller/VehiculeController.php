<?php
class VehiculeController{

    public function addForm()
    {
        $type=[
            'Diesel',
            'Essence',
            'Electrique'
        ];
        return $type;
    }

    public function persistForm()
    {

        $vehicule = new Vehicule(null, $_POST['name'], $_POST['type'], $_POST['catid']);
        $VehiculeManager = new VehiculeManager();
        $VehiculeManager->insert($vehicule);
        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
        //var_dump($vehicule);
    }

    public function delete($id)
    {
        $VehiculeManager = new VehiculeManager();
        $VehiculeManager->delete($id);
        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }

    public function updateForm($id)
    {
        $VehiculeManager = new VehiculeManager();
        $vehicule = $VehiculeManager->select($id);
        return $vehicule;
    }

    public function updateVehicule($id)
    {
        $VehiculeManager = new VehiculeManager();
        $vehicule = $VehiculeManager->select($id);
        $vehicule = new Vehicule($id, $_POST['name'], $_POST['type'], $_POST['catid']);
        $VehiculeManager->update($vehicule);

        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }
}