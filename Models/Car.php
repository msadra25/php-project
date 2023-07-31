<?php namespace Models;



use Exception;
use League\Csv\Writer;
use League\Csv\Reader;
use League\Csv\Statement;



class Car{

    private $id ;
    private $brand;
    private $model;
    private $year;
    private $price; 


    public function __construct()
    {
        // $this->id = setId($id);
        // $this->brand = setBrand($brand);
        // $this->model = setModel($model);
        // $this->year = setYear($year);
        // $this->price = setPrice($price);   
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of brand
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
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
     * Set the value of brand
     *
     * @return  self
     */ 
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function toJson(){
        return [
            "Id" => $this->id,
            "Brand" => $this->getBrand(),
            "Model" => $this->getModel(),
            "Year" => $this->getYear(),
            "Price" => $this->getPrice(),
        ];
    }

    public function saveInfo($file){
        $reader = Reader::createFromPath($file, 'r');
        $reader->setHeaderOffset(0);
        $writer = Writer::createFromPath($file, 'a');
        $this->setId(count($reader)+1);

        $reader = Reader::createFromPath($file, 'r');
        // $reader->setHeaderOffset(0);
        $records = $reader->fetchColumn(count($reader));
        
        $writer->insertOne([
            count($reader)+1,
            $this->getBrand(),
            $this->getModel(),
            $this->getYear(),
            $this->getPrice(),
        ]);
        return true;
    }



    public static function getInfo($file, $key, $value){
        $reader = Reader::createFromPath($file, 'r');
        $reader->setHeaderOffset(0);
        $records = Statement::create()
            ->where(fn(array $record) => (bool) strcmp($record[$key], $value) == 0)
            ->process($reader, ["Id","Brand","Model","Year","Price"]);
        return $records;
    }

    public static function deleteInfo($file ,$id){
        $header = ["Id","Brand","Model","Year","Price"];
        $carAvailable = false;
        $reader = Reader::createFromPath($file, 'r');
        $reader->setHeaderOffset(0);
        $records = Statement::create()
            ->process($reader, $header);
        $result = [];
        foreach($records as $record){
            if(strcmp($record["Id"], $id) == 0){
                $carAvailable = true;
                continue;
            }
            array_push($result, $record);
        }
        $writer = Writer::createFromPath($file, 'w');
        $writer->insertOne($header);
        $writer->insertAll($result, $records->getHeader());
        return $carAvailable;
    }
}