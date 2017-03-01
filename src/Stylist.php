

<?php
Class Stylist
{
    private $id;
    private $name;
    private $telephone;
    private $availability;
    function __construct($id = null, $name, $telephone, $availability)
    {
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

    function setAvailability($new_availability) {
        $this->availability = (string) $new_availability;
    }

    // CRUD
    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylists(name, telephone, availability) VALUES (
            '{$this->getName()}',
            '{$this->getTelephone()}',
            '{$this->getAvailability()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");

        $all_stylists = array();

        if($returned_stylists){
            foreach($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $name = $stylist['name'];
                $telephone = $stylist['telephone'];
                $availability= $stylist['availability'];
                $new_stylist = new Stylist($id, $name, $telephone, $availability);
                array_push($all_stylists, $new_stylist);
            }
        }
        return $all_stylists;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists;");

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
            $new_client = new Client($id, $name, $telephone, $stylist_id);
            array_push($clients, $new_client);
        }
        return $clients;
    }

    static function find($search_id)
    {
        $found_stylist = null;
        $stylists = Stylist::getAll();
        foreach($stylists as $stylist) {
            $stylist_id = $stylist->getId();
            if ($stylist_id == $search_id) {
                $found_stylist = $stylist;
            }
        }
        return $found_stylist;
    }

}
?>
