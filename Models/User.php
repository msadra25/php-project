<?php namespace Models;
require_once __DIR__ . '/../vendor/autoload.php';
use Exception;
use League\Csv\Writer;
use League\Csv\Reader;

class User{
    private $id;
    private $firstName;
    private $lastName;
    private $phone;
    private $email;
    private $address;
    private $age;
    
    public function __construct()
    {

    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $re = "/^[a-zA-Z0-9_\.]{3,}@[a-zA-Z\.]{2,}\.[a-zA-Z]{2,3}$/m";
        if(preg_match($re, $email, $matches)){
            $this->email = $email;
        }else{
            $e = new Exception("Please Enter a valid Email address!", 10001);
            throw $e;
        }
        

        return $this;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function toJson(){
        return [
            "Id" => $this->id,
            "First Name" => $this->getFirstName(),
            "Last Name" => $this->getLastName(),
            "Phone" => $this->getPhone(),
            "Email" => $this->getEmail(),
            "Address" => $this->getAddress(),
            "Age" => $this->getAge()
        ];
    }

    public function save($file){
        $reader = Reader::createFromPath($file, 'r');
        $reader->setHeaderOffset(0);
        $writer = Writer::createFromPath($file, 'a');
        $this->setId(count($reader)+1);
        $writer->insertOne([
            count($reader)+1,
            $this->getFirstName(),
            $this->getLastName(),
            $this->getPhone(),
            $this->getAddress(),
            $this->getEmail(),
            $this->getAge()
        ]);
        return true;
    }

}