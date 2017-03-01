


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

    function test_setAvailability()
    {
        //Arrange
        $availability = "Monday, Friday";
        $test_availability = new Stylist($id, $name, $telephone, $availability);
        $new_availability = "Friday, Sunday";
        //Act
        $set_availability= $test_availability->setAvailability($new_availability);
        $result = $test_availability->getAvailability();
        //Assert
        $this->assertEquals($new_availability, $result);

    }

    // CRUD TEST
    function test_save()
    {
        // Arrange
        $id = null;
        $name = "Machuca";
        $telephone = 34523;
        $availability = "Tusday";
        $new_stylist = new Stylist($id, $name, $telephone, $availability);
        $new_stylist->save();
        // Act
        $result = Stylist::getAll();
        // Assert
        $this->assertEquals($new_stylist, $result[0]);
    }

    function test_getAll()
    {
        // Arrange
        $id= null;
        $name = "Machuca";
        $telephone = 34523;
        $availability= "Wednesday";
        $new_stylist = new Stylist($id, $name, $telephone, $availability);
        $new_stylist->save();


        $id= null;
        $name = "Silvino";
        $telephone = 1242;
        $availability= "Thursday";
        $new_stylist2 = new Stylist($id, $name, $telephone, $availability);
        $new_stylist2->save();
        // Act
        $result = Stylist::getAll();
        // Assert
        $this->assertEquals([$new_stylist, $new_stylist2], $result);
    }

    function test_deleteAll()
    {
        // Arrange
        $id = null;
        $name = "Jacinto";
        $telephone = 1242;
        $availability = "Monday";
        $test_name = new Stylist($id, $name, $telephone,  $availability);
        $test_name->save();

        $id2 = null;
        $name2 = "Silvino";
        $telephone2 = 1242;
        $availability2= "Wednesday";
        $test_name2 = new Stylist($id2, $name2, $telephone2, $availability2);
        $test_name2->save();
        // Act
        $result = Stylist::deleteAll();
        $result = Stylist::getAll();
        // Assert
        $this->assertEquals([], $result);
    }

    function testGetClients()
    {
        // Arrange
        // Two stylists
        $name = "Jacinto";
        $test_stylist = new Stylist($id, $name, $telephone, $availability);
        $test_stylist->save();

        $name2 = "Silvino";
        $test_stylist2 = new Stylist($id, $name2, $telephone, $availability);
        $test_stylist2->save();

        // Three clients
        $id = null;
        $name = "Anthony";
        $telephone = 34523;
        $email = "felixpgmail";
        $test_stylist_id = $test_stylist->getId();
        $new_client = new Client($id, $name, $telephone, $test_stylist_id);
        $new_client->save();

        $id2 =null;
        $name2 = "Machuca";
        $telephone2 = 12433124;
        $email2 = "felixpgmail";
        $test_stylist_id2 = $test_stylist->getId();
        $new_client2 = new Client($id2, $name2, $telephone2, $test_stylist_id2);
        $new_client2->save();

        $id3 = null;
        $name3 = "Silvino";
        $telephone3 = 1242;
        $email3 = "felixpgmail";
        $test_stylist_id3 = $test_stylist3->getId();
        $new_client3 = new Client($id3, $name3, $telephone3, $test_stylist_id3);
        $new_client3->save();

        // Act
        $result = $test_stylist->getClients();
        // Assert
        $this->assertEquals([$new_client, $new_client2], $result);
    }

    function test_find()
    {
        //Arrange
        $name = "Machuca";
        $telephone = 34523;
        $availability = "Monday, Friday";
        $test_stylist = new Stylist($id, $name, $telephone, $availability);
        $test_stylist->save();

        $name2 = "Silvino";
        $telephone2 = 1242;
        $availability = "Monday, Thursday";
        $test_stylist2 = new Stylist($id2, $name2, $telephone2, $availability2);
        $test_stylist2->save();
        //Act
        $result = Stylist::find($test_stylist2->getId());
        //Assert
        $this->assertEquals($test_stylist2, $result);
    }


}
?>
