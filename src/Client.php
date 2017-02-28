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
}
?>
