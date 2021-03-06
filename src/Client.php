<?php
Class Client
{
    private $name;
    private $telephone;
    private $stylist_id;
    private $id;


    function __construct($name, $telephone, $stylist_id, $id = null) {
        $this->name = $name;
        $this->telephone = $telephone;
        $this->stylist_id = $stylist_id;
        $this->id = $id;
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
            $new_client = new Client($name,  $telephone, $stylist_id, $id);
            array_push($all_clients, $new_client);
        }
        return $all_clients;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM clients;");

    }

    function getClients()
    {
        $clients = Array();
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
        foreach($returned_clients as $client) {
            $id = $client['id'];
            $name = $client['name'];
            $telephone = $client['telephone'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($name, $telephone, $stylist_id, $id);
            array_push($clients, $new_client);
        }
        return $clients;
    }

    static function find($search_id)
    {
        $found_client = null;
        $clients = Client::getAll();
        foreach($clients as $client) {
            $client_id = $client->getId();
            if ($client_id == $search_id) {
                $found_client = $client;
            }
        }
        return $found_client;
    }
}
?>
