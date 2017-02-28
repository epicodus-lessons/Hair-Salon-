



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
}
?>
