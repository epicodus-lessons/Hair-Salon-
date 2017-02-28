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
        $this->availability = $availability;

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

    function getTelephone()
    {
        return $this->telephone;
    }

    function getAvailability()
    {
        return $this->availability;
    }

    // Setters
    function setName($new_name) {
        $this->name =  (string) $new_name;
    }

    function setTelephone($new_telephone) {
        $this->telephone = (int) $new_telephone;
    }

}
?>
