<?php
    class VehiculeManager extends DbManager {
        public function __construct()
        {
            parent::__construct();
        }

        public function selectAll()
        {
            $vehicule = [];
            $sql =  'SELECT * FROM vehicule ORDER BY type';
            foreach  ($this->bdd->query($sql) as $row) {
                $vehicule[] = new Vehicule($row['id'], $row['name'], $row['type'], $row['catid']);
            }

            return $vehicule;
        }


        public function insert(Vehicule $vehicule)
        {
            $name = $vehicule->getName();
            $type = $vehicule->gettype();
            $catid = $vehicule->getCatid();

            $requete = $this->bdd->prepare("INSERT INTO vehicule (name, type, catid ) VALUES (?,?,?)");
            $requete->bindParam(1, $name);
            $requete->bindParam(2, $type);
            $requete->bindParam(3, $catid);
            $requete->execute();
            $vehicule->setId($this->bdd->lastInsertId());
        }

        public function delete($id)
        {
            $requete = $this->bdd->prepare("DELETE FROM vehicule where id = ?");
            $requete->bindParam(1,$id);
            $requete->execute();
        }

        public function select($id)
        {
            $requete = $this->bdd->prepare("SELECT * FROM vehicule WHERE id=?");
            $requete->bindParam(1, $id);
            $requete->execute();
            $res = $requete->fetch();
            $vehicule = new Vehicule($res['id'], $res['name'], $res['type'], $res['catid']);

            return $vehicule;
        }

        public function update(Vehicule $vehicule)
        {
            $name = $vehicule->getName();
            $type = $vehicule->gettype();
            $catid = $vehicule->getCatid();
            $id = $vehicule->getId();
            $requete = $this->bdd->prepare("UPDATE  vehicule SET name =? , type = ?, catid = ? WHERE id = ?");
            $requete->bindParam(1, $name);
            $requete->bindParam(2, $type);
            $requete->bindParam(3, $catid);
            $requete->bindParam(4, $id);
            $requete->execute();
        }

        

    }
?>