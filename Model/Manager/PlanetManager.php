<?php
    class PlanetManager extends DbManager {
        public function __construct()
        {
            parent::__construct();
        }

        public function selectAll()
        {
            $planets = [];
            $sql =  'SELECT * FROM planets ORDER BY id';
            foreach  ($this->bdd->query($sql) as $row) {
                $planets[] = new Planet($row['id'], $row['name'], $row['terrain'], $row['allegiance'], $row['status'], $row['key_fact'], $row['image']);
            }

            return $planets;
        }

        public function insert(Planet $planet)
        {
            $name = $planet->getName();
            $terrain = $planet->getTerrain();
            $allegiance = $planet->getAllegiance();
            $status = $planet->getStatus();
            $keyFact = $planet->getKey_fact();
            $image = $planet->getImage();

            $requete = $this->bdd->prepare("INSERT INTO planets (name, terrain, allegiance, status, key_fact, image) VALUES (?,?,?,?,?,?)");
            $requete->bindParam(1, $name);
            $requete->bindParam(2, $terrain);
            $requete->bindParam(3, $allegiance);
            $requete->bindParam(4, $status);
            $requete->bindParam(5, $keyFact);
            $requete->bindParam(6, $image);
            $requete->execute();
            $planet->setId($this->bdd->lastInsertId());
        }

        public function delete($id)
        {
            $requete = $this->bdd->prepare("DELETE FROM planets where id = ?");
            $requete->bindParam(1,$id);
            $requete->execute();
        }

        public function select($id)
        {
            $requete = $this->bdd->prepare("SELECT * FROM planets WHERE id=?");
            $requete->bindParam(1, $id);
            $requete->execute();
            $res = $requete->fetch();
            $planet = new planet($res['id'], $res['name'], $res['terrain'], $res['allegiance'], $res['status'], $res['key_fact'], $res['image']);

            return $planet;
        }

        public function update(planet $planet)
        {
            $name = $planet->getName();
            $terrain = $planet->getTerrain();
            $allegiance = $planet->getAllegiance();
            $status = $planet->getStatus();
            $keyFact = $planet->getKey_fact();
            $image = $planet->getImage();
            $id = $planet->getId();
            $requete = $this->bdd->prepare("UPDATE  planets SET name =? , terrain = ?, allegiance = ?, status = ?, key_fact = ?, image = ? WHERE id = ?");
            $requete->bindParam(1, $name);
            $requete->bindParam(2, $terrain);
            $requete->bindParam(3, $allegiance);
            $requete->bindParam(4, $status);
            $requete->bindParam(5, $keyFact);
            $requete->bindParam(6, $image);
            $requete->bindParam(7, $id);
            $requete->execute();
        }

        public function update_without_img(planet $planet)
        {
            $name = $planet->getName();
            $terrain = $planet->getTerrain();
            $allegiance = $planet->getAllegiance();
            $status = $planet->getStatus();
            $keyFact = $planet->getKey_fact();
            $image = $planet->getImage();
            $id = $planet->getId();
            $requete = $this->bdd->prepare("UPDATE  planets SET name =? , terrain = ?, allegiance = ?, status = ?, key_fact = ? WHERE id = ?");
            $requete->bindParam(1, $name);
            $requete->bindParam(2, $terrain);
            $requete->bindParam(3, $allegiance);
            $requete->bindParam(4, $status);
            $requete->bindParam(5, $keyFact);
            $requete->bindParam(6, $id);
            $requete->execute();
        }

    }
?>