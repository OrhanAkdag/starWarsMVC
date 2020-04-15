<?php

class Vehicule {
    
    protected $id;
    protected $name;
    protected $type;
    protected $catid;
    /**
     * Personntype constructor
     *
     * @param string $name
     * @param string $type
     */
    public function __construct($id, $name, $type, $catid )
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->catid = $catid;

    }

    
    /**
     * Get the value of type
     */ 
    public function gettype()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of catid
     */ 
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * Set the value of catid
     *
     * @return  self
     */ 
    public function setCatid($catid)
    {
        $this->catid = $catid;

        return $this;
    }
}