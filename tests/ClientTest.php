

<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylist.php";
require_once "src/Client.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);


class ClientTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        Stylist::deleteAll();
    }

    function test_getId()
    {
        //Arrange
        $id = 1;
        $test_id = new Client($id, $name, $type_of_cut, $telephone, $email, $address, $stylist_id);
        //Act
        $result = $test_id->getId();
        //Assert
        $this->assertEquals($id, $result);

    }

    function test_getName()
    {
        //Arrange
        $name = "Jhon";
        $test_name = new Client($id, $name, $telephone, $stylist_id);
        //Act
        $result = $test_name->getName();
        //Assert
        $this->assertEquals($name, $result);

    }

    function test_getTelephono()
    {
        //Arrange
        $telephone = 534;
        $test_telephone = new Client($id, $name, $telephone, $stylist_id);
        //Act
        $result = $test_telephone->getTelephone();
        //Assert
        $this->assertEquals($telephone, $result);

    }

    function test_getStylistId()
    {
        //Arrange

        $id = null;
        $name = 'Robert';
        $telephone = 02347209487;
        $availability = "Monday";
        $new_stylist = new Stylist($id, $name, $telephone, $availability);
        $new_stylist->save();


        $id = 1;
        $name = "Anthony";
        $telephone = 34523;
        // We collect the id from here
        $stylist_id = $new_stylist->getId();
        $test_stylist_id = new Client($id, $name, $telephone, $stylist_id);
        //Act
        $result = $test_stylist_id->getStylistId();
        //Assert
        $this->assertEquals($stylist_id, $result);

    }

    function test_setName()
    {
        // Arrange
        $name = 'Robert';
        $test_name = new Client($id, $name, $telephone, $stylist_id);
        $new_name = "Sebastian";
        // Act
        $set_new_name = $test_name->setName($new_name);
        $result = $test_name->getName();
        // Assert
        $this->assertEquals($new_name, $result);
    }

    function test_setTelephone()
    {
        // Arrange
        $telephone = 12345;
        $test_telephone = new Client($id, $name, $telephone, $stylist_id);
        $new_telephone= 098765;
        // Act
        $set_new_telephone = $test_telephone->setTelephone($new_telephone);
        $result = $test_telephone->getTelephone();
        // Assert
        $this->assertEquals($new_telephone, $result);
    }

    function test_setStylistId()
    {
        // Arrange
        $stylist_id = 3;
        $test_stylist_id = new Client($id, $name, $telephone, $stylist_id);
        $new_stylist_id = 1;
        // Act
        $set_new_stylist_id = $test_stylist_id->setStylistId($new_stylist_id);
        $result = $test_stylist_id->getStylistId();
        // Assert
        $this->assertEquals($new_stylist_id, $result);
    }

    // CRUD TEST
    function test_save()
    {
        // Arrange
        $id = null;
        $name = "Anthony";
        $telephone = 34523;
        $new_client = new Client($id, $name, $telephone, $stylist_id);
        $new_client->save();
        // Act
        $result = Client::getAll();
        // Assert
        $this->assertEquals($new_client, $result[0]);
    }

    function test_getAll()
    {
        // Arrange
        $name = "Machuca";
        $telephone = 34523;
        $new_client = new Client($id, $name, $telephone, $stylist_id);
        $new_client->save();


        $name = "Silvino";
        $telephone = 1242;
        $new_client2 = new Client($id, $name, $telephone, $stylist_id);
        $new_client2->save();
        // Act
        $result = Client::getAll();
        // Assert
        $this->assertEquals([$new_client, $new_client2], $result);
    }

}



?>
