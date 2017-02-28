


<?php
Class Client
{
    private $id;
    private $name;
    private $telephone;
    private $stylist_id;


    function __construct($id = null, $name, $telephone, $stylist_id) {
        $this->id = $id;
        $this->name = $name;
        $this->telephone = $telephone;
        $this->stylist_id = $stylist_id;
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
    function getStylistId()
    {
        return $this->stylist_id;
    }

    // Setters
    function setName($new_name) {
        $this->name = (string) $new_name;
    }

    function setTelephone($new_telephone) {
        $this->telephone = (int) $new_telephone;
    }

    function setStylistId($new_stylist_id)
    {
        $this->stylist_id = (int) $new_stylist_id;
    }
}
?>
