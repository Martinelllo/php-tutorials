<?php

// enable strict mode. that causes that integer cannot be interpreted as a string for exempla.
// a try catch block throws now strict TypeErrors
declare(strict_types = 1);

interface DBObject {
    public function getId();
    public function getName();
}

abstract class Person implements DBObject {
    private int $id;
    private string $name;
    private string $email;

    /**
     * Class constructor.
     */
    public function __construct(int $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

class Customer extends Person {
    private $balance;
    private static $maxNameLength = 25;


    public function __construct(int $id, string $name, string $email, float $balance) {
        parent::__construct($id, $name, $email);
        $this->balance = $balance;
        echo 'Customer constructed <br>';
    }

    /**
     * destroy function will be executed on script end
     */
    public function __destruct() {
        echo 'Customer destructed <br>';
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setBalance(float $balance) {
        $this->balance = $balance;
    }

    public function getNameAndBalance() {
        return "$this->name $this->balance";
    }

    // factory design pattern
    public static function createCustomer(string $name) {
        return new Customer(1, $name, 'brad@gmx.com', 5);
    }

    // how to access a static property
    public static function getMaxNameLength() {
        return self::$maxNameLength;
    }
}

class Animal implements DBObject {
    private int $id;
    private string $name;
    private string $type;

    public function __construct(int $id, string $name, string $type) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

// type decoration example (type hinting)
function printDbObject(DBObject $dbObject) {
    echo $dbObject->getId() . " " . $dbObject->getName() . "<br>";
}

// access to a static function
echo "maxNameLength = " . Customer::getMaxNameLength() . "<br>";

$customer = Customer::createCustomer('Brad Traversy');

$anime = new Animal(15, 'Ricky', 'Dog');

// try catch block get type errors because the id is a string in this exempla.
try {
    $anime2 = new Animal('15', 'Ricky', 'Dog');
} catch (TypeError $err) {
    echo $err . "<br>";
}

printDbObject($customer);
printDbObject($anime);

$customer->setName('Babbo Chabbo');
$customer->setBalance(10);

echo $customer->getNameAndBalance() . "<br>";


?>