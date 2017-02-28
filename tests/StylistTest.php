

<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Stylist.php";
require_once "src/Client.php";

$server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);


class Stylist_test extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {


    }

    //GETTERS TEST

    function test_getId()
    {
        //Arrange
        $id = 1;
        $test_id = new Stylist($id, $name, $telephone, $availability);
        //Act
        $result = $test_id->getId();
        //Assert
        $this->assertEquals($id, $result);
    }

    function test_getName()
    {
        //Arrange
        $name = "Machuca";
        $test_name = new Stylist($id, $name, $telephone, $availability);
        //Act
        $result = $test_name->getName();
        //Assert
        $this->assertEquals($name, $result);
    }

    function test_getTelephono()
    {
        //Arrange
        $telephone = 534;
        $test_telephone = new Stylist($id, $name, $telephone, $availability);
        //Act
        $result = $test_telephone->getTelephone();
        //Assert
        $this->assertEquals($telephone, $result);
    }

    function test_getAvailability()
    {
        //Arrange
        $availability = "Monday, Tuesday";
        $test_availability = new Stylist($id, $name, $telephone, $availability);
        //Act
        $result = $test_availability->getAvailability();
        //Assert
        $this->assertEquals($availability, $result);
    }

    // SETTERS TEST

    function test_setName()
    {
        //Arrange
        $name = "Jhon";
        $test_name = new Stylist($id, $name, $telephone, $availability);
        $new_name = "Philips";
        //Act
        $set_name = $test_name->setName($new_name);
        $result = $test_name->getName();
        //Assert
        $this->assertEquals($new_name, $result);

    }


    function test_setTelephone()
    {
        //Arrange
        $telephone = 123456;
        $test_telephone = new Stylist($id, $name, $telephone, $availability);
        $new_telephone = 987654;
        //Act
        $set_telephone = $test_telephone->setTelephone($new_telephone);
        $result = $test_telephone->getTelephone();
        //Assert
        $this->assertEquals($new_telephone, $result);

    }
}
?>
