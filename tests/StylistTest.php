
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
        Stylist::deleteAll();
        Client::deleteAll();
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

}
?>
