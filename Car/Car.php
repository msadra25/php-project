<?php


require __DIR__ . '/vendor/autoload.php';



class Car{

    private $id ;
    private $brand;
    private $model;
    private $year;
    private $price; 

    

    function __construct($brand=null, $model=null, $year=null, $price=null) {
        // implement id setting(Auto incremental)
        if($brand != null){
        $f = fopen("last_id.txt", "r+");
        $last_id = fread($f, filesize("last_id.txt"));
        if(!is_numeric($last_id)){
            throw new Exception("file is currupted!");
        }
        $last_id = intval($last_id) + 1;
        $this->id = jdate()->format('YmdHis')."_".$last_id;
        rewind($f);
        fwrite($f, $last_id);
        fclose($f);
    }
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
    
    }

    public function getId(){
        return $this->id;

    }
    public function getBrand() {
        return $this->brand;
    }
    public function getModel() {
        return $this->model;
    }
    public function getYear() {
        return $this->year;
    }
    public function getPrice() {
        return $this->price;
    }



    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setBrand($id){
        $this->id = $id;
        return $this;
    }
    public function setModel($id){
        $this->id = $id;
        return $this;
    }
    public function setYear($id){
        $this->id = $id;
        return $this;
    }
    public function setPrice($id){
        $this->id = $id;
        return $this;
    }
   
    

    function saveInfo(){
        
        $f = fopen("cars.txt/carsInfo.txt", "a");
        fwrite($f, $this->id."\n".$this->brand."\n".$this->model."\n".$this->year."\n".$this->price."\n"."=============="."\n");
        fclose($f);
        
    }

    // function getCar($id, $brand, $model, $year, $priceRange){
    //     // echo $id." ".$brand." ".$model." ".$year." ".$priceRange;

    // }

    // function retrieveId($id){
    //     $re = "/($id)\n([a-z]+)\n(.+)\n(\d*)\n(\d+)/m";
    //     $f = fopen("cars.txt/carsInfo.txt", "r");
    //     $str = fread($f, filesize("cars.txt/carsInfo.txt"));
    //     preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
    //     $this->id = $id;
    //     $this->brand = $matches[0][2];
    //     $this->model = $matches[0][3];
    //     $this->year =  $matches[0][4];
    //     $this->price =  $matches[0][5];
    //     // Print the entire match resul
    //     return $this;
    // }

    // function retrieveBrand($brand){
    //     $re = "/(.+\d)\n($brand)\n(.+)\n(\d{4})\n(\d+)/m";
    //     $f = fopen("cars.txt/carsInfo.txt", "r");
    //     $str = fread($f, filesize("cars.txt/carsInfo.txt"));
    //     preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
    //     $this->id = $matches[0][1];
    //     $this->brand = $brand;
    //     $this->model = $matches[0][3];
    //     $this->year =  $matches[0][4];
    //     $this->price =  $matches[0][5];
    //     // Print the entire match resul
    //     return $this;
    // }

    // function retrieveModel($model){
    //     $re = "/(.+\d)\n([a-z]+)\n($model)\n(\d{4})\n(\d+)/m";
    //     $f = fopen("cars.txt/carsInfo.txt", "r");
    //     $str = fread($f, filesize("cars.txt/carsInfo.txt"));
    //     preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
    //     $this->id = $matches[0][1];
    //     $this->brand = $matches[0][2];
    //     $this->model = $model;
    //     $this->year =  $matches[0][4];
    //     $this->price =  $matches[0][5];
    //     // Print the entire match resul
    //     return $this;
    // }

    // function retrieveYear($year){
    //     $re = "/(.+\d)\n([a-z]+)\n(.+)\n($year)\n(\d+)/m";
    //     $f = fopen("cars.txt/carsInfo.txt", "r");
    //     $str = fread($f, filesize("cars.txt/carsInfo.txt"));
    //     preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
    //     $this->id = $matches[0][1];
    //     $this->brand = $matches[0][2];
    //     $this->model = $matches[0][3];
    //     $this->year =  $year;
    //     $this->price =  $matches[0][5];
    //     // Print the entire match resul
    //     return $this;
    // }

    // function retrievePrice($price){
    //     $re = "/(.+\d)\n([a-z]+)\n(.+)\n(\d{4})\n($price)/m";
    //     $f = fopen("cars.txt/carsInfo.txt", "r");
    //     $str = fread($f, filesize("cars.txt/carsInfo.txt"));
    //     preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
    //     $this->id = $matches[0][1];
    //     $this->brand = $matches[0][2];
    //     $this->model = $matches[0][3];
    //     $this->year =  $matches[0][4];
    //     $this->price =  $price;
    //     // Print the entire match resul
    //     return $this;
    // }

    function getInfo($file, $key, $value){
        $f = fopen($file, "r");
        if(strcmp($key, $value) == 0 ){
            $re = "/(.+\d)\n(getBrand())\n(.+)\n(\d{4})\n(\d+)/m";
            $f = fopen("cars.txt/carsInfo.txt", "r");
            $str = fread($f, filesize("cars.txt/carsInfo.txt"));
            preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
            $this->id = $matches[0][1];
            $this->brand = $brand;
            $this->model = $matches[0][3];
            $this->year =  $matches[0][4];
            $this->price =  $matches[0][5];
        }
        
        return $this;
    }
}

