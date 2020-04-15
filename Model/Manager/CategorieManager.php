<?php
    class CategorieManager extends DbManager {
        public function __construct()
        {
            parent::__construct();
        }

        public function selectAll()
        {
            $categorie = [];
            $sql =  'SELECT * FROM categorie ORDER BY name';
            foreach  ($this->bdd->query($sql) as $row) {
                $categorie[] = new Categorie($row['id'], $row['name']);
            }

            return $categorie;

        }


        public function insert(Categorie $categorie)
        {
            $name = $categorie->getName();
            $requete = $this->bdd->prepare("INSERT INTO categorie (name) VALUES (?)");
            $requete->bindParam(1, $name);
            $requete->execute();
            $categorie->setId($this->bdd->lastInsertId());
        }

        public function delete($id)
        {
            $requete = $this->bdd->prepare("DELETE FROM categorie where id = ?");
            $requete->bindParam(1,$id);
            $requete->execute();
        }

        public function select($id)
        {
            $requete = $this->bdd->prepare("SELECT * FROM categorie WHERE id=?");
            $requete->bindParam(1, $id);
            $requete->execute();
            $res = $requete->fetch();
            $categorie = new Categorie($res['id'], $res['name']);

            return $categorie;
        }

        public function update(Categorie $categorie)
        {
            $name = $categorie->getName();
            $id = $categorie->getId();
            $requete = $this->bdd->prepare("UPDATE  categorie SET name =? WHERE id = ?");
            $requete->bindParam(1, $name);
            $requete->bindParam(2, $id);
            $requete->execute();
        }

        

    }
?>