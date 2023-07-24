<?php


require __DIR__ . '/vendor/autoload.php';



class Car{

    public $id ;
    public $brand;
    public $model;
    public $year;
    public $price; 

    

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
        fclose($f);}
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
    
    }


    function get_brand() {
        return $this->brand;
    }
    function get_model() {
        return $this->model;
    }
    function get_year() {
        return $this->year;
    }
    function get_price() {
        return $this->price;
    }
    function set_id($id){
        $this->id = $id;
    }

    

    function save_info(){
        
        $f = fopen("cars.txt/carsInfo.txt", "a");
        fwrite($f, $this->id."\n".$this->brand."\n".$this->model."\n".$this->year."\n".$this->price."\n"."=============="."\n");
        fclose($f);
        
    }

     function retrieve($id){
        $re = "/($id)\n([a-z]+)\n(.+)\n(\d{4})\n(\d+)/m";
        $f = fopen("cars.txt/carsInfo.txt", "r");
        $str = fread($f, filesize("cars.txt/carsInfo.txt"));
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
        $this->id = $id;
        $this->brand = $matches[0][2];
        $this->model = $matches[0][3];
        $this->year =  $matches[0][4];
        $this->price =  $matches[0][5];
        // Print the entire match resul
        return $this;
            
    
    
     }
}