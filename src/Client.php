




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

    // CRUD

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO clients (name, telephone, stylist_id) VALUES ('{$this->getName()}', '{$this->getTelephone()}',
        '{$this->getStylistId()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");

        $all_clients = array();
        foreach($returned_clients as $client) {
            $id = $client['id'];
            $name = $client['name'];
            $telephone = $client['telephone'];
            $stylist_id = $stylist['stylist_id'];
            $new_client = new Client($id, $name,  $telephone, $stylist_id);
            array_push($all_clients, $new_client);
        }
        return $all_clients;
    }
}
?>
