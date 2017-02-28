
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
        //  Stylist::deleteAll();
        //  Client::deleteAll();
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
}



?>
