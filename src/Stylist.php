<?php
Class Stylist
{
    private $id;
    private $name;
    private $telephone;
    private $availability;
    function __construct($id = null, $name, $telephone, $availability) {
        $this->id = $id;
        $this->name = $name;
        $this->telephone = $telephone;
    }
    // Getters
    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }
}
?>
