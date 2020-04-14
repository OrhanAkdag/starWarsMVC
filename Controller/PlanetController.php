<?php
class PlanetController{

    public function addForm()
    {
        $allegiance=[
            'Clan Fett',
            'Commerce Guild',
            'Confederacy of Independant Systems',
            'Corporate Alliance',
            'Dark Lords of the Sith',
            'Death Watch',
            'First Order',
            'Free Ryloth movement',
            'Galactic Empire',
            'Galactic Republic',
            'Gungan Grand Army',
            'Hutts',
            'Intergalactic Banking Clan',
            'Jedi Order',
            'Lothal Rebels',
            'Mandalorian Clans',
            'Nightbrothers',
            'Nightsisters',
            'Nite Owls',
            'Rebel Alliance',
            'Shadow Collective',
            'The Resistance',
            'Techno Union',
            'Trade Federation',
            'Tusken Raiders',
            'Twi\'lek Freedom Fighters'
        ];
        require 'View/insert_form.php';
    }

    public function persistForm()
    {
        $imageUrl = null;
        $allowedExtension = ['image/png','image/jpeg','image/gif'];
        if(in_array($_FILES['image']['type'],$allowedExtension)){
            if($_FILES['image']['size'] < 80000000){
                $extension = explode('/', $_FILES['image']['type'])[1];
                $imageUrl = uniqid().'.'.$extension;
                move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/'.$imageUrl);
            }

        } 

        $planet = new Planet(null, $_POST['name'], $_POST['terrain'], $_POST['allegiance'], $_POST['status'], $_POST['key_fact'], $imageUrl);
        $planetManager = new PlanetManager();
        $planetManager->insert($planet);
        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }

    public function delete($id)
    {
        $PlanetManager = new PlanetManager();
        $PlanetManager->delete($id);
        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }

    public function updateForm($id)
    {
        $allegiance=[
            'Clan Fett',
            'Commerce Guild',
            'Confederacy of Independant Systems',
            'Corporate Alliance',
            'Dark Lords of the Sith',
            'Death Watch',
            'First Order',
            'Free Ryloth movement',
            'Galactic Empire',
            'Galactic Republic',
            'Gungan Grand Army',
            'Hutts',
            'Intergalactic Banking Clan',
            'Jedi Order',
            'Lothal Rebels',
            'Mandalorian Clans',
            'Nightbrothers',
            'Nightsisters',
            'Nite Owls',
            'Rebel Alliance',
            'Shadow Collective',
            'The Resistance',
            'Techno Union',
            'Trade Federation',
            'Tusken Raiders',
            'Twi\'lek Freedom Fighters'
        ];

        $PlanetManager = new PlanetManager();
        $planet = $PlanetManager->select($id);

        require 'View/update_form.php';
    }

    public function updateplanet($id)
    {
        $imageUrl = null;
        $allowedExtension = ['image/png','image/jpeg','image/gif'];
        if($_FILES['image']['size'] == 0){
            $imageUrl = null;

        }
        if(in_array($_FILES['image']['type'],$allowedExtension)){
            if($_FILES['image']['size'] < 80000000){
                $extension = explode('/', $_FILES['image']['type'])[1];
                $imageUrl = uniqid().'.'.$extension;
                move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/'.$imageUrl);
            }

        } 

        $PlanetManager = new PlanetManager();
        $planet = $PlanetManager->select($id);
        if(!is_null($imageUrl)){
        $planet = new planet($id, $_POST['name'], $_POST['terrain'], $_POST['allegiance'], $_POST['status'], $_POST['key_fact'], $imageUrl);
        $PlanetManager->update($planet);
        }

        else{
            $planet = new planet($id, $_POST['name'], $_POST['terrain'], $_POST['allegiance'], $_POST['status'], $_POST['key_fact'],null);
            $PlanetManager->update_without_img($planet);
            }

        header('Location: /starwarsMVC/index.php?controller=default&action=home.html');
    }
}
